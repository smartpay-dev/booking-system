<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Management</h1>

    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus"></i> Add User
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Teams</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($users as $user): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['user_email']; ?></td>
                            <td><?= $user['user_level']; ?></td>
                            <td><?= $user['user_teams']; ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" data-id="<?= $user['id']; ?>" 
                                        data-name="<?= $user['username']; ?>" data-email="<?= $user['user_email']; ?>"
                                        data-level="<?= $user['user_level']; ?>" data-toggle="modal" data-target="#editUserModal">
                                    <i class="fas fa-edit"> Edit</i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $user['id']; ?>">
                                    <i class="fas fa-trash"> Delete</i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="user_email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="user_level" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Teams</label>
                        <select class="form-control" name="user_teams" required>
                            <option value="Network">Network</option>
                            <option value="RnD_Development">RnD/Development</option>
                            <option value="IT_Support">IT Support</option>
                            <option value="Infra">Infra</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/edit'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" id="edit_email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Leave blank if no change">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" id="edit_level" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Teams</label>
                        <select class="form-control" name="is_active" id="edit_status" required>
                            <option value="Helpdesk">Helpdesk</option>
                            <option value="Network">Network</option>
                            <option value="RnD_Development">RnD/Development</option>
                            <option value="IT_Support">IT Support</option>
                            <option value="Infra">Infra</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#dataTable').DataTable();

    // Edit button click handler
    $('.edit-btn').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var level = $(this).data('level');
        var status = $(this).data('status');

        $('#edit_id').val(id);
        $('#edit_name').val(name);
        $('#edit_email').val(email);
        $('#edit_level').val(level);
        $('#edit_status').val(status);

        $('#editUserModal').modal('show');
    });

    // Delete button click handler
    $('.delete-btn').click(function() {
        var id = $(this).data('id');
        if(confirm('Are you sure you want to delete this user?')) {
            window.location.href = "<?= base_url('user/delete/'); ?>" + id;
        }
    });
});
</script>
