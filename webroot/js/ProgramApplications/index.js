var app = angular.module('app', []);

app.controller('ProgramApplicationsCRUDCtrl', ['$scope', 'ProgramApplicationsCRUDService', function ($scope, ProgramApplicationsCRUDService) {
    //TODO: remove messages and unused $scope.xxx
    //fired when the page loads
    $scope.getAllApplications = function () {
        ProgramApplicationsCRUDService.getAllApplications()
            .then(function success(response) {
                    $scope.programApplications = response.data.data;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting applications!';
                });
    }

    $scope.initAdd = function () {
        ProgramApplicationsCRUDService.getFaculties()
            .then(function success(response) {
                $scope.faculties = response.data;
            });
        ProgramApplicationsCRUDService.getUniversities()
            .then(function success(response) {
                $scope.universities = response.data;
            });
    }

    $scope.displayAddForm = function () {
        $('.prog-app-index').hide();
        $('.prog-app-edit').hide();
        $('.prog-app-add').show();
    }

    //create a new application like with New Program Application
    $scope.addApplication = function () {
        if ($scope.university && $scope.program) {
            ProgramApplicationsCRUDService.addApplication($scope.university, $scope.program, new Date())
                .then(function success(response) {
                        $scope.message = 'Application added!';
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error adding application!';
                        $scope.message = '';
                    });
        }
    }

    //get application - from the actions menu 'view'
    $scope.getApplication = function (id) {
        $('.prog-app-index').hide();
        $('.prog-app-view').show();
        ProgramApplicationsCRUDService.getApplication(id)
            .then(function success(response) {
                    $scope.application = response.data.data;
                    $scope.application.id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    if (response.status === 404) {
                        $scope.errorMessage = 'Application not found!';
                    } else {
                        $scope.errorMessage = "Error getting application!";
                    }
                });
    }

    //display the application update form
    $scope.displayUpdateForm = function (application) {
        $scope.application = application;
        $('.prog-app-index').hide();
        $('.prog-app-edit').show();
        ProgramApplicationsCRUDService.getApplicationStatuses()
            .then(function success(response) {
                    $scope.applicationStatuses = response.data.data;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting applications!';
                });
        ProgramApplicationsCRUDService.getApplicationOutcomes()
            .then(function success(response) {
                    $scope.applicationOutcomes = response.data.data;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting applications!';
                });

    }

    //update application outcome with application id - from the actions menu 'update'
    $scope.updateApplication = function () {
        ProgramApplicationsCRUDService.updateApplication($scope.application, $scope.application_outcome, $scope.application_status)
            .then(function success(response) {
                    $scope.message = 'Application data updated!';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error updating application!';
                    $scope.message = '';
                });
    }


    //delete application from actions menu - 'delete'
    $scope.deleteApplication = function (id) {
        if (confirm('Are you sure you want to delete this application?')) {
            ProgramApplicationsCRUDService.deleteApplication(id)
                .then(function success(response) {
                        $scope.getAllApplications();
                        $scope.message = 'Application deleted!';
                        $scope.application = null;
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error deleting application!';
                        $scope.message = '';
                    })
        }
    }
}]);

app.service('ProgramApplicationsCRUDService', ['$http', function ($http) {

    this.getAllApplications = function getAllApplications() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.getFaculties = function getFaculties() {
        return $http({
            method: 'GET',
            url: urlToFaculties,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.getUniversities = function getUniversities() {
        return $http({
            method: 'GET',
            url: urlToUniversities,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.addApplication = function addApplication(university, program, date) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            //TODO: add user_id and created
            data: {university_id: university.id, program_id: program.id},
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.getApplication = function getApplication(id) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.getApplicationStatuses = function getApplicationStatuses() {
        return $http({
            method: 'GET',
            url: urlToApplicationStatuses,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.getApplicationOutcomes = function getApplicationOutcomes() {
        return $http({
            method: 'GET',
            url: urlToApplicationOutcomes,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.updateApplication = function updateApplication(application, application_outcome, application_status) {
        let $outcome_id = ((application_outcome === undefined) ? application.application_outcome_id : application_outcome.id);
        let $status_id = ((application_status === undefined) ? application.application_status_id : application_status.id);

        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + application.id,
            data: {application_outcome_id: $outcome_id, application_status_id: $status_id},
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
    }

    this.deleteApplication = function deleteApplication(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
    }

}]);


