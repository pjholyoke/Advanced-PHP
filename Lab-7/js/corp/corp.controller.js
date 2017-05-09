(function () {
  'use strict';
  angular
    .module('app.corp')
    .controller('CorpController', CorpController);

  CorpController.$inject = ['CorpService'];
  /*
   * Simple controller to get information for the view.
   */
  function CorpController(CorpService) {
    var vm = this;

    vm.Corps = [];

    activate();
   ////////////

    function activate() {
      CorpService.getAllCorps().then(function (response) {
        vm.Corps = response;
      });
    }
  }
})();