
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


//MASK INPUT
// nonInput: elements we consider nonInput
// dataMask: we mask data-mask elements by default
// watchInputs: watch for dynamically added inputs by default
// watchDataMask: by default we disabled the watcher for dynamically added data-mask elements by default (performance reasons)
 $.jMaskGlobals = {
    maskElements: 'input,td,span,div',
    dataMaskAttr: '*[data-mask]',
    dataMask: true,
    watchInterval: 300,
    watchInputs: true,
    watchDataMask: false,
    byPassKeys: [9, 16, 17, 18, 36, 37, 38, 39, 40, 91],
    translation: {
        '0': {pattern: /\d/},
        '9': {pattern: /\d/, optional: true},
        '#': {pattern: /\d/, recursive: true},
        'A': {pattern: /[a-zA-Z0-9]/},
        'S': {pattern: /[a-zA-Z]/}
    }
  };

// var SPMaskBehavior = function (val) {
//   return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
// },
// spOptions = {
//   onKeyPress: function(val, e, field, options) {
//       field.mask(SPMaskBehavior.apply({}, arguments), options);
//     }
// };

// $('.celphone').mask(SPMaskBehavior, spOptions);