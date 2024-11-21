@extends('nav')
@section('title', 'Release Note Senior Life Care Trusts')
@section('wrapper')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <style>
        .nav-item {
            margin-top: -15px;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }
    </style>

    <div class="container-xl px-4 mt-4">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Release Note</h5>
        <!-- Account page navigation-->

        <form method="post" id="save-release-note">
            @csrf
             <div class="card">
                <div class='card-header p-1'><button class="btn btn-primary submit-btn pt-1 pb-1 " style="float:right"><i class="tf-icons bx bx-layout "></i> Save  </button> </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <label for="form-label">Release Details</label>
                            <textarea name="details" class="form-control" rows="3" maxlength="300"></textarea>
                        </div>
                    </div>
                </div>
        </form>
            </div>
            <div class="card mt-2">
                <div class='card-header p-2'>Release Notes List </div>
                <table class="table table-bordered dataTable">
                    <head>
                        <tr>
                            <th>ID</th>
                            <th>Created By</th>
                            <th>Details</th>
                            <th>Created At</th>
                        </tr>
                    </head>
                    <tbody>
                            @foreach ($release_notes as $item)
                        <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->admin->full_name() }}</td>
                                <td>{{ $item->notes }}</td>
                                <td>{{ us_date_format($item->created_at) }}</td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
         $(document).ready(function() {
        $('.dataTable').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
            "order": false // "0" means First column and "desc" is order type;
        });
    });
        $(document).on('submit', '#save-release-note', function(e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.submit-btn').attr('disabled', true);
            $.ajax({
                type: "POST",
                url: "{{ route('add.release.note') }}",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    swal.fire('Success!', 'Note added successfully!', 'success');
                    window.location.reload();
                    $('.submit-btn').attr('disabled', false);
                },
                error: function(xhr) {
                    $('.submit-btn').attr('disabled', false);
                    erroralert(xhr);
                }

            })
        })

        $(document).on('click', '.clear-form', function() {
            $('#save-adjustment').trigger('reset');
        })
    </script>
@endsection
