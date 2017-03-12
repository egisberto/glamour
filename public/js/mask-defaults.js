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

var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }

    //console.log(field);
};

$('.phone_9_digits').mask(SPMaskBehavior, spOptions);