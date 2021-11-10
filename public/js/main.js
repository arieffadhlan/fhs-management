function slideToggle(t,e,o){0===t.clientHeight?j(t,e,o,!0):j(t,e,o)}function slideUp(t,e,o){j(t,e,o)}function slideDown(t,e,o){j(t,e,o,!0)}function j(t,e,o,i){void 0===e&&(e=400),void 0===i&&(i=!1),t.style.overflow="hidden",i&&(t.style.display="block");var p,l=window.getComputedStyle(t),n=parseFloat(l.getPropertyValue("height")),a=parseFloat(l.getPropertyValue("padding-top")),s=parseFloat(l.getPropertyValue("padding-bottom")),r=parseFloat(l.getPropertyValue("margin-top")),d=parseFloat(l.getPropertyValue("margin-bottom")),g=n/e,y=a/e,m=s/e,u=r/e,h=d/e;window.requestAnimationFrame(function l(x){void 0===p&&(p=x);var f=x-p;i?(t.style.height=g*f+"px",t.style.paddingTop=y*f+"px",t.style.paddingBottom=m*f+"px",t.style.marginTop=u*f+"px",t.style.marginBottom=h*f+"px"):(t.style.height=n-g*f+"px",t.style.paddingTop=a-y*f+"px",t.style.paddingBottom=s-m*f+"px",t.style.marginTop=r-u*f+"px",t.style.marginBottom=d-h*f+"px"),f>=e?(t.style.height="",t.style.paddingTop="",t.style.paddingBottom="",t.style.marginTop="",t.style.marginBottom="",t.style.overflow="",i||(t.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(l)})}

let sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');
for(var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];
	sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function(e) {
        e.preventDefault();
        
        let submenu = sidebarItem.querySelector('.submenu');
        if( submenu.classList.contains('active') ) submenu.style.display = "block"

        if( submenu.style.display == "none" ) submenu.classList.add('active')
        else submenu.classList.remove('active')
        slideToggle(submenu, 300)
    })
}

/**
 * Sidebar Wrapper
 */
const Sidebar = function (sidebarEL) {
  /**
   * Sidebar Element
   * @param  {HTMLElement} sidebarEL
   */
  this.sidebarEL = sidebarEL instanceof HTMLElement ? sidebarEL : document.querySelector(sidebarEL);

  /**
   * Init Sidebar
   */
  this.init = function () {
    // add event listener to sidebar
    document.querySelector('.burger-btn').addEventListener('click', this.toggle.bind(this));
    document.querySelector('.sidebar-hide').addEventListener('click', this.toggle.bind(this));
    window.addEventListener('resize', this.onResize.bind(this));

    // Perfect Scrollbar Init
    if(typeof PerfectScrollbar == 'function') {
      const container = document.querySelector(".sidebar-wrapper");
      const ps = new PerfectScrollbar(container, {
          wheelPropagation: false
      });
    }

    // Scroll into active sidebar
    setTimeout(() => document.querySelector('.sidebar-item.active').scrollIntoView(false), 100);

    // check responsive
    this.OnFirstLoad();

    // 
    return this;
  }

  /**
   * OnFirstLoad
   */
  this.OnFirstLoad = function () {
    var w = window.innerWidth;
    if(w < 1200) {
      this.sidebarEL.classList.remove('active');
    }
  }

  /**
   * OnRezise Sidebar
   */
  this.onResize = function () {
    var w = window.innerWidth;
    if(w < 1200) {
      this.sidebarEL.classList.remove('active');
    } else {
      this.sidebarEL.classList.add('active');
    }
    // reset 
    this.deleteBackdrop();
    this.toggleOverflowBody(true);
  }

  /**
   * Toggle Sidebar
   */
  this.toggle = function () {
    const sidebarState = this.sidebarEL.classList.contains('active');
    if (sidebarState) {
      this.hide();
    } else {
      this.show();
    }
  }

  /**
   * Show Sidebar
   */
  this.show = function () {
    this.sidebarEL.classList.add('active');
    this.createBackdrop();
    this.toggleOverflowBody();
  }

  /**
   * Hide Sidebar
   */
  this.hide = function () {
    this.sidebarEL.classList.remove('active');
    this.deleteBackdrop();
    this.toggleOverflowBody();
  }


  /**
   * Create Sidebar Backdrop
   */
  this.createBackdrop = function () {
    this.deleteBackdrop();
    const backdrop = document.createElement('div');
    backdrop.classList.add('sidebar-backdrop');
    backdrop.addEventListener('click', this.hide.bind(this));
    document.body.appendChild(backdrop);
  }

  /**
   * Delete Sidebar Backdrop
   */
  this.deleteBackdrop = function () {
    const backdrop = document.querySelector('.sidebar-backdrop');
    if (backdrop) {
      backdrop.remove();
    }
  }

  /**
   * Toggle Overflow Body
   */
  this.toggleOverflowBody = function (active) {
    const sidebarState = this.sidebarEL.classList.contains('active');
    const body = document.querySelector('body');
    if (typeof active == 'undefined') {
      body.style.overflowY = sidebarState ? 'hidden' : 'auto';
    } else {
      body.style.overflowY = active ? 'auto' : 'hidden';
    }
  }
}


/**
 * Create Sidebar Wrapper
*/
let sidebarEl = document.getElementById('sidebar');
if (sidebarEl) {
  window.sidebar = new Sidebar(sidebarEl).init();
}

// Password show and hide
function password_show_hide() {
  let password_input = document.getElementById("password");
  let show_eye = document.getElementById("show_eye");
  let hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (password_input.type === "password") {
    password_input.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    password_input.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}

// Confirm Password show and hide
function password_confirm_show_hide() {
  let passwordConfirm_input = document.getElementById("password-confirm");
  let confirm_show_eye = document.getElementById("confirm_show_eye");
  let confirm_hide_eye = document.getElementById("confirm_hide_eye");
  console.log(passwordConfirm_input);
  confirm_hide_eye.classList.remove("d-none");
  if (passwordConfirm_input.type === "password") {
    passwordConfirm_input.type = "text";
    confirm_show_eye.style.display = "none";
    confirm_hide_eye.style.display = "block";
  } else {
    passwordConfirm_input.type = "password";
    confirm_show_eye.style.display = "block";
    confirm_hide_eye.style.display = "none";
  }
}

// Account Image 
function readURL(input) {
  console.log(input);
  if (input.files && input.files[0]) {
      let reader = new FileReader();
      let previewImage = document.getElementById("preview-account-image");

      reader.onload = function (e) {
          previewImage.setAttribute('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
      previewImage.style.display = "flex";
      previewImage.style.width = "300px";
  }
}

function clearAccountImage() {
  let previewImage = document.getElementById("preview-account-image");
  previewImage.src = "";
}

function AccountImageClose() {
  let accountImageInput = document.getElementById("account-image");
  let previewImage = document.getElementById("preview-account-image");
  accountImageInput.value = "";
  previewImage.src = "";
}