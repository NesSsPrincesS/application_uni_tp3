var app = angular.module('linkedlists', []);
app.controller('FacultiesController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.faculties = response.data;
    });
});
