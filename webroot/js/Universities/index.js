var app = angular.module('app', []);

app.controller('UniversityCRUDCtrl', ['$scope', 'UniversityCRUDService', function ($scope, UniversityCRUDService) {

        $scope.updateUniversity = function () {
            UniversityCRUDService.updateUniversity($scope.university.id, $scope.university.name, $scope.university.adress, $scope.university.web_site)
                    .then(function success(response) {
                        $scope.message = 'University data updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating university!';
                                $scope.message = '';
                            });
        }

        $scope.getUniversity = function () {
            var id = $scope.university.id;
            UniversityCRUDService.getUniversity($scope.university.id)
                    .then(function success(response) {
                        $scope.university = response.data.data;
                        $scope.university.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'University not found!';
                                } else {
                                    $scope.errorMessage = "Error getting university!";
                                }
                            });
        }

        $scope.addUniversity = function () {
            if ($scope.university != null && $scope.university.name && $scope.university.adress) {
                UniversityCRUDService.addUniversity($scope.university.name, $scope.university.adress, $scope.university.web_site)
                        .then(function success(response) {
                            $scope.message = 'University added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding university!';
                                    $scope.message = '';
                                });
            } else if (!$scope.university.name) {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }else if (!$scope.university.adress){
                $scope.errorMessage = 'Please enter an adress!';
                $scope.message = '';
            }
        }

        $scope.deleteUniversity = function () {
            UniversityCRUDService.deleteUniversity($scope.university.id)
                    .then(function success(response) {
                        $scope.message = 'University deleted!';
                        $scope.university = null;
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting university!';
                                $scope.message = '';
                            })
        }

        $scope.getAllUniversities = function () {
            UniversityCRUDService.getAllUniversities()
                    .then(function success(response) {
                        $scope.universities = response.data.data;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting universities!';
                            });
        }

    }]);

app.service('UniversityCRUDService', ['$http', function ($http) {

        this.getUniversity = function getUniversity(universityId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + universityId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.addUniversity = function addUniversity(name, adress, web_site) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name, adress: adress, web_site: web_site},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.deleteUniversity = function deleteUniversity(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.updateUniversity = function updateUniversity(id, name, adress, web_site) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {name: name, adress: adress, web_site: web_site},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.getAllUniversities = function getAllUniversities() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

    }]);


