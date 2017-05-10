(function () {

  'use strict';
  angular
    .module('app.corp')
    .controller('CorpDetailController', CorpDetailController);

  CorpDetailController.$inject = ['$routeParams', 'CorpService'];

  /*
   * This controller will find the details of an Corp from the Corp service.
   */
  function CorpDetailController($routeParams, CorpService) {
    var vm = this;

    vm.Corp = {};
    var corpId = $routeParams.corpId;

    activate();

    ////////////

    function activate() {
      CorpService.getCorp(corpId).then(function (response) {
        vm.Corp = response;
        console.log(vm.Corp);
        /*if (vm.Corp.hasOwnProperty('birthday')) {
                    vm.Corp.birthday = new Date(vm.Corp.birthday);
                }
                console.log(vm.Corp);                
                loadMap('41.8239890,-71.4128340');*/
        loadMap(vm.Corp.location);
      });
    }

    function loadMap(location) {
      var lat = location.split(',')[0];
      var long = location.split(',')[1];

      var myCenter = new google.maps.LatLng(lat, long);

      var mapProp = {
        center: myCenter,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.querySelector('.googleMap'), mapProp);
      var marker = new google.maps.Marker({
        position: myCenter
      });
      marker.setMap(map);
    }
  }

})();