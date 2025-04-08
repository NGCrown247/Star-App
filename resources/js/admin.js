// app.js



export default function adminApp() {
  return{
      open: false,
      modalTitle: "New User",
      buttonActionType: "Create",
      deleteConfirmText: false,
      showInputs: true,
      accessCodeInput: false,
      queryParam:"",
      usersRepo: [],

      users: [],
      userForm: {
          id: null,
          full_name: "",
          email: "",
          phone_number: "",
          address: "",
          password: "",

      },

      getUsers() {
          axios.get('/admin/all-users', { ContentType: "application/json", Accept: "application/json" })
              .then(res => {
                  console.log("Fetched Users:", res.data); // Debugging line
                  this.users = res.data.users
                  this.usersRepo = res.data.users
              })
              .catch(error => {

                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Error Fetching Users!",
                      showConfirmButton: false,
                      timer: 1500,

                  });

              console.error("Error Fetching User:", error);

      });

      },



      editUser(user){
          this.userForm = { ...user };
          this.modalTitle="Update User",
          this.showModal('userModal');
          this.buttonActionType = "Update"
      },

      createUser(){
          axios.post('/admin/users', this.userForm)
          .then(res => {
              console.log("User Created:", res.data); // Debugging line
              this.resetForm();
              this.closeModal('userModal');
              this.getUsers();

              Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "User Created Successfully!",
                  showConfirmButton: false,
                  timer: 1500,

              });

          })
          .catch(error => {
              Swal.fire({
                  position: "center",
                  icon: "error",
                  title: "Error Creating User!",
                  showConfirmButton: false,
                  timer: 1500,
              });
              this.openModal('userModal');
              console.error("Error Creating User:", error);
          });

      },

      updateUser() {
          axios.put(`/admin/users/${this.userForm.id}`, this.userForm)
              .then(res => {
                  console.log("User Updated:", res.data); // Debugging line
                  this.getUsers();
                  this.closeModal('userModal');

                  Swal.fire({
                      position: "center",
                      icon: "success",
                      title: "User Updated Successfully!",
                      showConfirmButton: false,
                      timer: 1500,
                  });
              })
              .catch(error => {
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Error Updating User!",
                      showConfirmButton: false,
                      timer: 1500,
                  });
                  this.openModal('userModal');
                  console.error("Error updating user:", error);
              });
      },



      deleteUser(user) {
          Swal.fire({
              title: "Are you sure?",
              text: `You won't be able to revert ${user.full_name}'s account!`,
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!"
          })
          .then((result) => {
              if (result.isConfirmed) {
                  axios.delete(`/admin/users/${user.id}`)
                  .then(response => {
                      Swal.fire({
                          title: "Deleted!",
                          text: response.data.message,
                          timer: 1000,
                          icon: "success"
                      });
                      this.getUsers();
                  })
                  .catch(error => {
                      Swal.fire({
                          position: "center",
                          icon: "error",
                          title: "Error Deleting User!",
                          showConfirmButton: false,
                          timer: 1500,
                      });
                      this.closeModal('userModal');
                      console.error("Error deleting user:", error);
                  });
              }
          });
      },



// LOGIN START


// userLogin(){
//   this.btnDisabled =true;
//   this.isLoading =true;
//   axios.post('/users/auth/login', this.userForm)
//   .then(res =>{
//     if(res.data.succcus){
//       this.closeModal('loginModal')
//       console.log('User logged in successfully')
//       Swal.fire({
//         title: "Login successfully!",
//         // text: "Login successfully!",
//         icon: "success",
//         toast: true,
//         position: "top-end",
//         showConfirmButton: false,
//         timer: 3000,
//         timerProgressBar: true,
//     });
//     }

//   window.location.href = res.data.redirect; // Direct URL
//   })

//   .catch(error => {

//     if(error.response && error.response.data.errors){
//       this.errors = error.response.data.errors;

//       this.isLoading =false;
//       this.btnDisabled = false

//      }else{
//       Swal.fire({
//         title: "Something went wrong!",
//         text: "Please try again later! ",
//         icon: "error",
//         toast: true,
//         position: "top-end",
//         showConfirmButton: false,
//         timer: 3000,
//         timerProgressBar: true,
//     });


//      }



//   })
// },


// handleLogin(){
//   this.userLogin();
//   this.disabled = true;
// },


// handleLogout(){
//   axios.post('/users/auth/logout', this.userForm)
//   .then(res => {
//     console.log('User logged out successfully', res.data);
//   window.location.href = '/'; // Direct URL

//   })
// },


// LOGIN END













      handleSubmit(){
          if(this.buttonActionType === "Create"){
              this.createUser();

      }else if(this.buttonActionType === "Update"){
              this.updateUser();
      }else if(this.buttonActionType === "Delete"){
          this.deleteUser();
      }
  },



      openModal() {
          this.modalTitle="New User",
           this.buttonActionType = "Create"
          this.showModal('userModal');
          this.resetForm();


      },

      showModal(id) {
          let modalInstance = document.getElementById(id);
          if (modalInstance) {
              let modal = new bootstrap.Modal(modalInstance);
              modal.show('userModal');
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
          Object.keys(this.userForm).forEach(key => {
              this.userForm[key] = "";
          });
      },


      handleSearch(){
          this.users = this.usersRepo.filter(user => Object.values(user)
          .join().toLowerCase()
          .includes(this.queryParam.toLowerCase()));
          if(this.queryParam === ""){
            this.users=  this.usersRepo;
          }
        },




      init() {
          this.getUsers(); // Call getUsers() when component initializes
      },



  }

};
