(function () {

  'use strict';
  angular
    .module('app.address')
    .controller('AddressDeleteController', AddressDeleteController);

  AddressDeleteController.$inject = ['$routeParams','AddressService'];

  /*
   * This controller will find the details of an address from the address service.
   */
  function AddressDeleteController($routeParams, AddressService) {
    var vm = this;

    vm.address = {};
    vm.message = '';
    var addressID = $routeParams.addressId;

    activate();
   ////////////

    function activate() {
      AddressService.deleteAddress(addressID).then(function (response) {
        vm.message = "Address with ID of "+addressID+" successfully deleted!";
      },
      function() {
        vm.message = "Address with ID of "+addressID+" could not be deleted!";
      });
    }
  }
})();