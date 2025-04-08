import axios from 'axios';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import userApp from './users';
import planApp from './plans';
import adminApp from './admin';
import pagesApp from './pages';
import codeGeneratorApp from './codeGenerator';

window.Alpine = Alpine;
window.Swal = Swal;
window.axios = axios;
window.userApp = userApp;
window.planApp = planApp;
window.adminApp = adminApp;
window.pagesApp = pagesApp;
window.codeGeneratorApp = codeGeneratorApp;


Alpine.data('userApp', userApp);
Alpine.data('planApp', planApp);
Alpine.data('adminApp', adminApp);
Alpine.data('pagesApp', pagesApp);
Alpine.data('codeGeneratorApp', codeGeneratorApp);

Alpine.start();
