// app.js



export default function codeGeneratorApp() {
  return{
      modalTitle: "New User",
      buttonActionType: "Create",
      deleteConfirmText: false,
      showInputs: true,
      queryParam:"",

      plans: [],
      codesRepo: [],

      codes: [],
      codeForm: {
          id: null,
          number_of_codes:"",
          plan_id: "",


      },






      getPlans() {
        axios.get('/admin/auth/all-plans')
            .then(res => {
                console.log("Fetched Plans:", res.data); // Debugging line
                this.plans = res.data.plans
                this.plansRepo = res.data.plans

            })

            .catch(error => {
                this.closeModal('userModal');
                console.error("Error deleting user:", error);
            });
    },






      getCodes() {
          axios.get('/admin/all-codes', { ContentType: "application/json", Accept: "application/json" })
              .then(res => {
                  console.log("Fetched Codes:", res.data); // Debugging line
                  this.codes = res.data.codes
                  this.codesRepo = res.data.codes
              })
              .catch(error => {

                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Error Fetching Codes!",
                      showConfirmButton: false,
                      timer: 1500,

                  });

              console.error("Error Fetching Codes:", error);

      });

      },



      editCodes(user){
          this.userForm = { ...user };
          this.modalTitle="Update Codes",
          this.showModal('codeModal');
          this.buttonActionType = "Update"
      },

      createCode(){
          axios.post('/admin/codes', this.codeForm)
          .then(res => {
              console.log("Code Created:", res.data); // Debugging line
              this.resetForm();
              this.closeModal('codeModal');
              this.getCodes()
              Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "Code Created Successfully!",
                  showConfirmButton: false,
                  timer: 1500,

              });

          })
          .catch(error => {
              Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "Error Creating Codes!",
                  showConfirmButton: false,
                  timer: 1500,
              });
              this.openModal('codeModal');
              console.error("Error Creating Code:", error);
          });

      },

      updateCode() {
          axios.put(`/admin/codes/${this.codeForm.id}`, this.codeForm)
              .then(res => {
                  console.log("Code Updated:", res.data); // Debugging line
                  this.getCodes();
                  this.closeModal('codeModal');

                  Swal.fire({
                      position: "center",
                      icon: "success",
                      title: "Code Updated Successfully!",
                      showConfirmButton: false,
                      timer: 1500,
                  });
              })
              .catch(error => {
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Error Updating Code!",
                      showConfirmButton: false,
                      timer: 1500,
                  });
                  this.openModal('codeModal');
                  console.error("Error updating code:", error);
              });
      },



      deleteCode(code) {
          Swal.fire({
              title: "Are you sure?",
              text: `You won't be able to revert ${code.code}!`,
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!"
          })
          .then((result) => {
              if (result.isConfirmed) {
                  axios.delete(`/admin/codes/${code.id}`)
                  .then(response => {
                      Swal.fire({
                          title: "Deleted!",
                          text: response.data.message,
                          timer: 1000,
                          icon: "success"
                      });
                      this.getCodes();
                  })
                  .catch(error => {
                      Swal.fire({
                          position: "center",
                          icon: "error",
                          title: "Error Deleting Code!",
                          showConfirmButton: false,
                          timer: 1500,
                      });
                      this.closeModal('codeModal');
                      console.error("Error deleting code:", error);
                  });
              }
          });
      },



      handleSubmit(){
          if(this.buttonActionType === "Create"){
              this.createCode();

      }else if(this.buttonActionType === "Update"){
              this.updateCode();
      }else if(this.buttonActionType === "Delete"){
          this.deleteCode();
      }
  },



      openModal() {
          this.modalTitle="New Code",
           this.buttonActionType = "Create"
          this.showModal('codeModal');
          this.resetForm();


      },

      showModal(id) {
          let modalInstance = document.getElementById(id);
          if (modalInstance) {
              let modal = new bootstrap.Modal(modalInstance);
              modal.show();
          }
      },

      closeModal(id) {
          let modalInstance = document.getElementById(id);
          if (modalInstance) {
              let modal = bootstrap.Modal.getInstance(modalInstance); // Get the existing instance
              if (modal) {
                  modal.hide();
              }
          }
      },


      resetForm() {
          Object.keys(this.codeForm).forEach(key => {
              this.codeForm[key] = "";
          });
      },


      handleSearch(){
          this.codes = this.codesRepo.filter(user => Object.values(code)
          .join().toLowerCase()
          .includes(this.queryParam.toLowerCase()));
          if(this.queryParam === ""){
            this.codes=  this.codesRepo;
          }
        },




      init() {
          this.getCodes(); 
          this.getPlans();      // Call getCodes() when component initializes
      },



  }

};
