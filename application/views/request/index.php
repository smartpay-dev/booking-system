<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Booking Form</h1>
    <form action="<?= base_url('request/submit_request'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <!-- <div class="form-group">
            <label for="room_name">Room Name</label>
            <input type="text" class="form-control" id="room_name" name="room_name" required>
        </div> -->
        <div class="form-group">
            <label for="room_name">Room Name</label>
            <select class="form-control" name="room_name" id="room_name" required>
                <option value="Room Meeting 1">Room Meeting 1</option>
                <option value="Room Meeting 2">Room Meeting 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>
        <div class="form-group">
            <label for="request_date">Request Date</label>
            <input type="date" class="form-control" id="request_date" name="request_date" required>
        </div>

        <div class="form-group">
            <label for="request_description">Request Description</label>
            <textarea class="form-control" id="request_description" name="request_description" rows="4" required></textarea>
        </div>

        <!-- Tambahkan Form Upload File -->
        <div class="form-group">
            <label for="file">Upload File</label>
            <input type="file" class="form-control" id="file_name" name="file_name" accept="application/pdf,image/*,.doc,.docx,.xls,.xlsx,.txt">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
