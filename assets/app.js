/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// Import sliders JS file
import './js/sliders.js';

// Import filter JS file
import './js/filter.js';

// Import axios JS file
import './js/axiosTest.js';

import {Tooltip, Toast, Popover} from "bootstrap";
import 'bootstrap';
require('bootstrap/dist/js/bootstrap.bundle');


// The code here below makes all pics in images folder to be used in twig templates
const imagesContext = require.context('./images', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);