<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    
    <!-- Menampilkan data statistik keluhan -->
    <!-- <div class="row" style="width: 100%;"> -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($count_all_data); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">On Progress Tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($count_data_progress); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Closed Tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($count_data_closed); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cancelled Tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($count_data_cancelled); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ban fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Tabel Data Keluhan -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Booking Meeting Room</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Request Date</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Room Name</th>
                                    <th>Meeting DateTime</th>
                                    <!-- <th>Date</th> -->
                                    <th>Description</th>
                                    <th>Status</th>
                                    <!-- <th>Created at</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach ($dashboard_data as $row): 
                                    date_default_timezone_set('Asia/Jakarta');
                                    $start_time = strtotime($row->start_time);
                                    $end_time = strtotime($row->end_time);
                                    $today = strtotime(date('H:i:s')); 
                                    $on_going = ($today >= $start_time && $today <= $end_time);
                                    $row_style = '';
                                    $status_room = '';
                                    if($on_going) {
                                        // $row_style = 'background-color: #ffcdd2; animation: blink-animation 1s infinite;';
                                        $status_room = 'ON GOING';
                                    } elseif($today > $end_time) {
                                        // $row_style = 'background-color: #ccffcc;';
                                        $status_room = 'CLOSED';
                                    } else {
                                        // $row_style = 'background-color: #ffffff;';
                                        $status_room = 'RESERVED';
                                    }
                                ?>
                                <tr style="<?= $row_style ?>">
                                </style>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->created_at; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->phone; ?></td>
                                    <td><?= $row->room_name; ?></td>
                                    <td><?= $row->start_end_time; ?></td>
                                    <!-- <td><?= $row->request_date; ?></td> -->
                                    <td><?= $row->request_description; ?></td>
                                    <td><?= $status_room; ?></td>
                                    <!-- <td><?= $row->created_at; ?></td> -->
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- <hr class="sidebar-divider"> -->

