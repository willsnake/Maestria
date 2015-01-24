<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" ng-controller="MainCtrl" id="demo">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">{{ calendarControl.getTitle() }}</h2>

                <div class="row">

                    <div class="col-md-6 text-center">
                        <div class="btn-group">

                            <button class="btn btn-primary" ng-click="calendarControl.prev()">Previous</button>
                            <button class="btn btn-default" ng-click="setCalendarToToday()">Today</button>
                            <button class="btn btn-primary" ng-click="calendarControl.next()">Next</button>
                        </div>
                    </div>

                    <br class="visible-xs visible-sm">

                    <div class="col-md-6 text-center">
                        <div class="btn-group">
                            <label class="btn btn-primary" ng-model="calendarView" btn-radio="'year'">Year</label>
                            <label class="btn btn-primary" ng-model="calendarView" btn-radio="'month'">Month</label>
                            <label class="btn btn-primary" ng-model="calendarView" btn-radio="'week'">Week</label>
                            <label class="btn btn-primary" ng-model="calendarView" btn-radio="'day'">Day</label>
                        </div>
                    </div>

                </div>

                <br>

                <mwl-calendar
                    calendar-events="events"
                    calendar-view="calendarView"
                    calendar-current-day="calendarDay"
                    calendar-control="calendarControl"
                    calendar-event-click="eventClicked($event)"
                    calendar-edit-event-html="'<i class=\'glyphicon glyphicon-pencil\'></i>'"
                    calendar-delete-event-html="'<i class=\'glyphicon glyphicon-remove\'></i>'"
                    calendar-edit-event-click="eventEdited($event)"
                    calendar-delete-event-click="eventDeleted($event)"
                    calendar-auto-open="true"
                    ></mwl-calendar>

                <br><br><br>

                <script type="text/ng-template" id="modalContent.html">
                    <div class="modal-header">
                        <h3 class="modal-title">Event action occurred!</h3>
                    </div>
                    <div class="modal-body">
                        <p>Action: <pre>{{ action }}</pre></p>
                        <p>Event: <pre>{{ event | json }}</pre></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" ng-click="$modalInstance.close()">OK</button>
                    </div>
                </script>

                <h3 id="event-editor">
                    Edit events
                    <button class="btn btn-primary pull-right" ng-click="events.push({title: 'New event', type: 'important'})">Add new</button>
                    <div class="clearfix"></div>
                </h3>

                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Starts at</th>
                        <th>Ends at</th>
                        <th>Remove</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="event in events">
                        <td><input type="text" class="form-control" ng-model="event.title"></td>
                        <td>
                            <select ng-model="event.type" class="form-control">
                                <option value="important">Important</option>
                                <option value="warning">Warning</option>
                                <option value="info">Info</option>
                                <option value="inverse">Inverse</option>
                                <option value="success">Success</option>
                                <option value="special">Special</option>
                            </select>
                        </td>
                        <td>
                            <p class="input-group" style="max-width: 250px">
                                <input type="text" class="form-control" readonly datepicker-popup="medium" ng-model="event.starts_at" is-open="event.startOpen" close-text="Close" />
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" ng-click="toggle($event, 'startOpen', event)"><i class="glyphicon glyphicon-calendar"></i></button>
                    </span>
                            </p>
                            <timepicker ng-model="event.starts_at" hour-step="1" minute-step="15" show-meridian="true"></timepicker>
                        </td>
                        <td>
                            <p class="input-group" style="max-width: 250px">
                                <input type="text" class="form-control" readonly datepicker-popup="medium" ng-model="event.ends_at" is-open="event.endOpen" close-text="Close" />
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" ng-click="toggle($event, 'endOpen', event)"><i class="glyphicon glyphicon-calendar"></i></button>
                    </span>
                            </p>
                            <timepicker ng-model="event.ends_at" hour-step="1" minute-step="15" show-meridian="true"></timepicker>
                        </td>
                        <td><button class="btn btn-danger" ng-click="events.splice($index, 1)">Delete</button></td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->