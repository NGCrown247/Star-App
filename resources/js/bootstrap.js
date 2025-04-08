document.addEventListener("DOMContentLoaded", function () {
  let sidebar = document.getElementById("staticBackdrop");
  let closeBtn = document.querySelector(".star-sidebar-close");

  function disableBodyScroll() {
      document.body.style.overflow = "hidden";
  }

  function enableBodyScroll() {
      document.body.style.overflow = "";
  }

  function resetOnResize() {
      if (window.innerWidth >= 992) {
          enableBodyScroll();
      } else {
          let sidebarOpen = sidebar.classList.contains("show"); // Bootstrap adds "show" class when open
          if (sidebarOpen) {
              disableBodyScroll();
          }
      }
  }

  sidebar.addEventListener("show.bs.offcanvas", disableBodyScroll);
  sidebar.addEventListener("hidden.bs.offcanvas", enableBodyScroll);

  if (closeBtn) {
      closeBtn.addEventListener("click", enableBodyScroll);
  }

  window.addEventListener("resize", resetOnResize);
});

// AUDIO
document.addEventListener("DOMContentLoaded", function () {
  let audioPlayers = document.querySelectorAll("audio");

  audioPlayers.forEach(audio => {
    audio.addEventListener("play", function () {
      audioPlayers.forEach(otherAudio => {
        if (otherAudio !== this) {
          otherAudio.pause();
        }
      });
    });
  });
});


document.addEventListener("DOMContentLoaded", function () {
  const dropdownLinks = document.querySelectorAll(".star-nav-link[data-bs-toggle='collapse']");

  dropdownLinks.forEach(link => {
      link.addEventListener("click", function () {
          const openDropdown = document.querySelector(".accordion-collapse.show");
          if (openDropdown && openDropdown.id !== this.getAttribute("data-bs-target").substring(1)) {
              new bootstrap.Collapse(openDropdown, { toggle: true });
          }
      });
  });
});

document.addEventListener('click', function(event) {
  // Check if the click is inside any .star-nav-item
  const isClickInside = event.target.closest('.star-nav-item');

  if (!isClickInside) {
      // If not inside, close all collapses
      const openedMenus = document.querySelectorAll('.my-navdrop.show');
      openedMenus.forEach(function(menu) {
          // Using Bootstrap's collapse instance
          const collapseInstance = bootstrap.Collapse.getInstance(menu);
          if (collapseInstance) {
              collapseInstance.hide();
          }
      });
  }
});
