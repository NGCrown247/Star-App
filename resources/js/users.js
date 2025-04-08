import axios from "axios";



export default function userApp() {
    return{
        modalTitle: "New User",
        deleteConfirmText: false,
        buttonActionType: "Register",

        paragraphTitle: "",

        btnDisabled: false,
        isLoading: false,
        hasError: false,

        errors: {},

        users: [],
        userForm: {
            id: null,
            full_name: "",
            email: "",
            phone_number: "",
            address: "",
            access_code: "",
            password: "",

        },




        createUser(){
          this.isLoading =true;
          this.btnDisabled = true
            axios.post('/users/auth/register', this.userForm)
            .then(res => {
                console.log("User Created:", res.data); // Debugging line
                this.resetForm();
                this.closeModal('registerModal');
                this.showModal('loginModal')
                this.isLoading =false;
                this.btnDisabled = false
                this.buttonActionType = "Register",
                Swal.fire({
                  title: "Registeration successful!",
                  text: "Login to continue! ",
                  icon: "success",
                  toast: true,
                  position: "top-end",
                  showConfirmButton: false,
                  timer: 5000,
                  timerProgressBar: true,
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


        userLogin(){
          this.btnDisabled =true;
          this.isLoading =true;
          axios.post('/users/auth/login', this.userForm)
          .then(res =>{
            if(res.data.succcus){
              this.closeModal('loginModal')
              console.log('User logged in successfully')
              Swal.fire({
                title: "Login successfully!",
                // text: "Login successfully!",
                icon: "success",
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            }

          window.location.href = res.data.redirect; // Direct URL
          })

          .catch(error => {

            if(error.response && error.response.data.errors){
              this.errors = error.response.data.errors;

              this.isLoading =false;
              this.btnDisabled = false

             }else{
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



          })
        },


        userLogout(){
          axios.post('/users/auth/logout')
          .then(res => {
            console.log('Logout Successful', res.data);
          window.location.href = '/'; // Direct URL

          })
        },



        handleSubmit(){
            this.createUser();
        },

        handleLogin(){
          this.userLogin();
          this.disabled = true;
        },

        handleLogout(){
          this.userLogout();
        },


        openRegister() {
          this.errors = {};
            this.modalTitle="Register",
            this.showModal('registerModal');
            this.resetForm();
            this.closeModal('loginModal');


        },
        openLogin() {
          this.errors = {};
            this.modalTitle="Register",
            this.showModal('loginModal');
            this.resetForm();
            this.closeModal('registerModal');
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
            Object.keys(this.userForm).forEach(key => {
                this.userForm[key] = "";
            });
        },

    }

};
