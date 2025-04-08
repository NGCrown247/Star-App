import axios from "axios";



export default function planApp(){
    return{
        modalTitle: "New Plan",
        buttonActionType: "Create",
        paragraphTitle:"Enter Email",
        planOtpVerify: false,
        planEmailVerify: true,
        deleteConfirmText: false,
        showInputs: true,
        queryParam:"",
        plansRepo: [],
        isLoading:false,
        isPaymentCompleted:false,
        successPayload:{},

        errors: {},
        btnDisabled: false,
        token: "",
        email: "", // To bind email input
        plan_id: null, // Add plan_id to track the selected plan


        plans: [],
        planForm: {
          id:null,
          image: "",
          plan_title: "",
          plan_price: "",
          plan_earn_daily: "",
          Benefit_header: "",
          play_video: "",
          answer_quiz: "",
          play_music: "",
          countDown_engagement: "",
          countDown_engagement_warning: "",

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

        editPlan(plan){
            this.planForm = { ...plan };
            this.modalTitle="Update Plan",
            this.showModal('planModal');
            this.buttonActionType = "Update"
        },


        createPlan(){
          const formData= new FormData()
          Object.entries(this.planForm).forEach(([key,value])=>{
           formData.append(key,value)
          })


            axios.post('/admin/plans', this.planForm, {headers:{"Content-Type":"multipart/form-data"}})
            .then(res => {
                console.log("Plan Created Successfully:", res.data); // Debugging line
                this.resetForm();
                this.closeModal('planModal');
                this.getPlans();

              Swal.fire({
                position: "center",
                icon: "success",
                title: "Plan Created Successfully!",
                showConfirmButton: false,
                timer: 1500,

            });


            })
            .catch(error => {
              if (error.response && error.response.status === 422) {
                  this.errors = error.response.data.errors; // Bind errors to Alpine.js
              } else {
                  Swal.fire({
                      title: "Something went wrong!",
                      text: "Please try again later!",
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                  });
              }

              // Reset loading state
              this.isLoading = false;
              this.btnDisabled = false;
          });

            },

        updatePlan(){
          const formData= new FormData()
          Object.entries(this.planForm).forEach(([key,value])=>{
           formData.append(key,value)


          })
            axios.post(`/admin/plans/${this.planForm.id}`, formData, {
              headers:{"Content-Type":"multipart/form-data"}
            })
            .then(res => {
                console.log("Plan Updated Successfully:", res.data); // Debugging line
                this.getPlans();
                this.closeModal('planModal');

                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Plan Updated Successfully!",
                    showConfirmButton: false,
                    timer: 1500,

                });
            })
            .catch(error => {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Error Updating Plan!",
                    showConfirmButton: false,
                    timer: 1500,
                });
                this.closeModal('userModal');
                console.error("Error Updating Plan:", error);
            });
        },

        deletePlan(plan){
          console.log(plan)
            Swal.fire({
                title: "Are you sure?",
                text: `You won't be able to revert this ${this.plan.plan_title}!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"})
                .then((result) => {
                if (result.isConfirmed) {

                    axios.delete(`/admin/plans/${plan.id}`)

                    .then(response => {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.data.message,
                            icon: "success"
                          });

                        this.getPlans();
                    })

                    .catch(error => {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Error Deleting Plan!",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        this.closeModal('userModal');
                        console.error("Error Deleting Plan:", error);
                    });

                }
              });
        },


        handleFile(event){

          this.planForm.image=event.target.files[0]

         },


        handleSubmit(){
            if(this.buttonActionType === "Create"){
                this.createPlan();
        }else if(this.buttonActionType === "Update"){
                this.updatePlan();
        }else if(this.buttonActionType === "Delete"){
            this.deletePlan();
        }
    },


    openPlanModal(plan){
      this.plan_id = plan.id;
      this.showModal('subscribePlanModal')
      this.modalTitle = "Email Verification";
      this.paragraphTitle = 'Please enter your email!';
    },


        openModal() {
            this.modalTitle="New Plan",
             this.buttonActionType = "Create"
            this.showModal('planModal');
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
                Object.keys(this.planForm).forEach(key => {
                    this.planForm[key] = "";
                });
            },

            handlePlanSubmit() {
              this.isLoading =true;
              this.btnDisabled = true
              const data={
                email: this.email,
                plan_id: this.plan_id
            }
                  // Send verification code
                  axios.post('admin/auth/send-verification', data)
                  .then(response => {
                      console.log("Verification sent", response.data);
                      this.isLoading=false;
                      this.closeModal('subscribePlanModal');
                      this.showModal('verifyPlanCodeModal')
                      this.modalTitle  = "Verification Token"
                      this.paragraphTitle = `Enter the token sent to your, ${this.email}`;
                      this.isLoading =false;
                      this.btnDisabled = false
                       Swal.fire({
                title: "Verification Code Sent!",
                // text: "Login successfully!",
                icon: "success",
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
                  })
                  .catch(res =>{

                    if(res.response && res.response.data.errors){

                      this.errors = res.response.data.errors;

                      this.isLoading =false;
                      this.btnDisabled = false;

                    }else {

                      console.error("Error sending verification code", error);
                      Swal.fire({
                        title: "Something went wrong!",
                        text: "Please try again later! ",
                        icon: "error",
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });

                    }
                  });

              },

              handleOtpVerify(){
                this.isLoading =true;
                this.btnDisabled = true
                  axios.post('admin/auth/verify-code', {
                    email: this.email,    // Include the necessary data
                    token: this.token,      // The verification code entered by the user
                    plan_id: this.plan_id
                  })
                  .then( res => {
                    this.isLoading=false
                    console.log(res.data);
                    this.closeModal('verifyPlanCodeModal')
                    this.isLoading =false;
                    this.btnDisabled = false
                   this.payWithStack()


                  })
                  .catch(error => {
                   if(error.response && error.response.data.errors){
                    this.errors = error.response.data.errors;
                    this.isLoading =false;
                    this.btnDisabled = true
                   }else {
                    console.error("Error sending verification code", error);
                    Swal.fire({
                      title: "Something went wrong!",
                      text: "Please try again later! ",
                      icon: "error",
                      toast: true,
                      position: "top-end",
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                  });
                   }
                });
                },



              //PAYSTACK
              payWithStack(){
                const data = {
                  plan_id:this.plan_id,
                  email:this.email
                };

                axios.post('/users/pay', data)
                .then(res =>{
                  const data = res.data.payload;

                  let handler = PaystackPop.setup({
                    key: "pk_test_2274858e635e4b734973c3b6d033d19a432dcb68",

                    email:data.email,
                    amount:data.amount,
                    currency: "NGN",
                    ref: data.reference,
                    callback: (res)=>{


                      if(res.status=="success"){
                        this.successPayload=res
                        this.isPaymentCompleted=true
                        this.showModal('registerModal');
                      }
                    }
                  });
                      handler.openIframe();

                })

                .catch(error => {
                  console.error("Error initializing Paystack:", error);
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: "Payment Initialization Failed",
                      text: error.response?.data?.message || "Something went wrong",
                      showConfirmButton: true
                  });
              });
              },


              sendAccessCode(){
                console.log("ssss",this.successPayload)
                if(this.isPaymentCompleted){
                  this.successPayload.plan_id=this.plan_id
                this.successPayload.email=this.email
                axios.post('/admin/auth/send-accessCode', this.successPayload)

                .then(res => {
                  console.log('Success', res.data);
                })

                .catch(res =>{
                  console.log('Error/something went wrong', res.data);
                })
                }

              },

            handleSearch(){
              this.plans = this.plansRepo.filter(plan => Object.values(plan)
              .join().toLowerCase()
              .includes(this.queryParam.toLowerCase()));
              if(this.queryParam === ""){
                this.plans=  this.plansRepo;
              }
            },

        init() {
            this.getPlans(); // Call getPlans() when component initializes
        },


    }


}
