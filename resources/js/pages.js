
export default function pagesApp(){


  return {

    showDashboard: false,




    readNotification(){
      this.showModal('notificationModal')
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


  }
}
