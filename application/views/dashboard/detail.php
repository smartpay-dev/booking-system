<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .card {
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem;
        }
        .card-body {
            padding: 1.25rem;
        }
        .detail-item {
            margin-bottom: 1rem;
        }
        .detail-label {
            font-weight: bold;
            color: #4e73df;
        }
        .status-form {
            margin-top: 2rem;
            padding: 1rem;
            background: #f8f9fc;
            border-radius: 0.35rem;
        }
        select, button {
            padding: 0.375rem 0.75rem;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            margin-right: 1rem;
        }
        button {
            background-color: #4e73df;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2e59d9;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Keluhan</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Keluhan</h6>
        </div>
        <div class="card-body">
            <div class="detail-item">
                <span class="detail-label">Nama Pelapor:</span>
                <span><?= $complaint['reporter_name']; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Email:</span>
                <span><?= $complaint['reporter_email']; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">No. Telepon:</span>
                <span><?= $complaint['reporter_phone']; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Tanggal Masalah:</span>
                <span><?= $complaint['issue_date']; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Kategori:</span>
                <span><?= $complaint['category']; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Judul Masalah:</span>
                <span><?= $complaint['issue_title']; ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Deskripsi Masalah:</span>
                <p><?= $complaint['issue_description']; ?></p>
            </div>
            <div class="detail-item">
                <span class="detail-label">Deadline:</span>
                <p><?= $complaint['deadline_date']; ?></p>
            </div>

            <div class="status-form">
                <form action="<?= base_url('complaint/update_status/' . $complaint['id']); ?>" method="post" class="mb-3">
                    <label for="status" class="detail-label">Update Status:</label>
                    <select name="status" id="status" class="form-control-sm">
                        <option value="">Pilih Status</option>
                        <option value="pending">Pending</option>
                        <option value="in_progress">Sedang Diproses</option>
                        <option value="resolved">Selesai</option>
                        <option value="cancelled">Dibatalkan</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                </form>

                <form action="<?= base_url('complaint/redirect_complaint/' . $complaint['id']); ?>" method="post">
                    <label for="new_category" class="detail-label">Alihkan ke Tim:</label>
                    <select name="new_category" id="new_category" class="form-control-sm">
                        <option value="Network">Network</option>
                        <option value="Parkee System">Parkee System</option>
                        <option value="IOT System">IOT System</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Alihkan Keluhan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/toastr.min.css')?>">
<script src="<?= base_url('assets/js/toastr.min.js')?>"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "timeOut": "3000",
        "extendedTimeOut": "1000"
    };

    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')): ?>
            toastr.success("<?= $this->session->flashdata('success'); ?>");
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            toastr.error("<?= $this->session->flashdata('error'); ?>");
        <?php endif; ?>
    });
</script>

</body>
</html>
