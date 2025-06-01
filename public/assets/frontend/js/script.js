function searchbar() {
         const el = document.querySelector('.search-bar');
         el.classList.toggle('active');
     }

     //end mobile dropdown menu and ofcanvas
     function openNav() {
         document.getElementById("mySidebar").style.width = "250px";
         document.querySelector(".navbar").style.marginLeft = "250px";
     }

     function closeNav() {
         document.getElementById("mySidebar").style.width = "0";
         document.querySelector(".navbar").style.marginLeft = "0";
     }
     const toggleDropdown = (dropdown, menu, isOpen) => {
         dropdown.classList.toggle("open", isOpen);
         if (isOpen) {
             menu.style.height = `${menu.scrollHeight}px`;
         } else {
             menu.style.height = "0px";
         }
     };

     document.querySelectorAll('.dropdown-togglee').forEach(dropdownToggle => {
         dropdownToggle.addEventListener("click", e => {
             e.preventDefault();

             const dropdown = e.target.closest(".dropdown-container");
             const menu = dropdown.querySelector(".dropdown-menus");
             const isOpen = dropdown.classList.contains("open")

             toggleDropdown(dropdown, menu, !isOpen)
         })
     })
     //end mobile dropdown and ofcanvas

     //back top button
     const backToTopBtn = document.getElementById("backToTopBtn");
     window.onscroll = function() {
         if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
             backToTopBtn.style.display = "block";
         } else {
             backToTopBtn.style.display = "none";
         }
     };
     backToTopBtn.addEventListener("click", function() {
         window.scrollTo({
             top: 0,
             behavior: 'smooth'
         });
     });

      //portfolio 
        function openSuccess(successName) {
            const sName = document.getElementsByClassName("suName");
            for (i = 0; i < sName.length; i++) {
                sName[i].style.display = "none";
            }
            document.getElementById(successName).style.display = "block";
        }
