import 'flowbite';
import './ToggleTheme.js';

import {browserSupportsWebAuthn, startAuthentication, startRegistration,} from '@simplewebauthn/browser'

window.browserSupportsWebAuthn = browserSupportsWebAuthn;
window.startAuthentication = startAuthentication;
window.startRegistration = startRegistration;

// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();
