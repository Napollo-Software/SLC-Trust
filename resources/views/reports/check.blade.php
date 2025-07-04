@extends('nav')
@section('title', 'Dashboard | Senior Life Care Trusts')
@section('wrapper')
<div>
    <h5 class=" d-flex justify-content-start pt-3 pb-1">
        <b></b>
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Create Check</b> </div>
    </h5>
    <div class="d-flex justify-content-between no-print">
        <div id="content">
            <form method="get" action="{{ route('submit.forms') }}">
                <div class="card">
                    <div class="card-header pb-0 pl-0">
                        <h5 class="card-title pl-2">Check Details</h5>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="check-number">Check Number</label>
                                <input type="number" id="check-number" class="form-control check-number-details" name="number[]" placeholder="Check number" min="0">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="check-date">Check Date</label>
                                <input type="date" id="check-date" class="form-control check-date-details" name="date[]" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="user-account">User Account</label>
                                <div class="form-group">
                                    <select id="user-account" name="user[]" class="form-control select-" style="width: 100%">
                                        <option value="">Select User Account</option>
                                        @foreach ($users->sortBy('name') as $user)
                                        <option value="{{ $user->name . ' ' . $user->last_name }}">
                                            {{ $user->name . ' ' . $user->last_name }}
                                            <b>{{ "($" . $user->balance . ')' }}</b>
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-number">Amount in Number</label>
                                <input type="number" id="amount-in-number" class="form-control amount-in-number-details" name="amount_in_number[]" onKeyPress="if(this.value.length==9) return false;" placeholder="Amount in number" min="0">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-word">Amount in Word</label>
                                <input type="text" id="amount-in-word" class="form-control amount-in-word-details" name="amount_in_word[]" placeholder="Amount in word">
                            </div>
                            <div class="col-md-6 p-2">
                                <label>Memo</label>
                                <textarea type="text" id="memo" class="form-control memo-details" name="memo[]" maxlength="60" placeholder="Memo"> </textarea>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="card-footer py-3">
                        <button class="btn btn-primary" id="but_add" type="button" onclick="add_more()"><i class="bx bx-plus pb-1"></i>Add more</button>
                        <button class="btn btn-secondary" type="submit"><i class="bx bx-printer"></i>Print</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="accounts" style="visibility:hidden">
    <option value="">Select Account</option>
    @foreach ($users as $user)
    <option value="{{ $user->name . ' ' . $user->last_name }}">{{ $user->name . ' ' . $user->last_name . "($" . $user->user_balance . ')' }}</option>
    @endforeach
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jquery.min.js" type="text/javascript"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js" type="text/javascript"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js" type="text/ja#ascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function collectFormData() {
        var formDataArray = [];
        $('.card-body').each(function() {
            var formData = {
                checkNumber: $(this).find('.check-number-details').val()
                , checkDate: $(this).find('.check-date-details').val()
                , user: $(this).find('.select-2[name="user"]').val()
                , amountInNumber: $(this).find('.amount-in-number-details').val()
                , amountInWord: $(this).find('.amount-in-word-details').val()
                , memo: $(this).find('.memo-details').val()
            };
            formDataArray.push(formData);
        });
        return formDataArray;
    }

    function sendFormData() {
        var formDataArray = collectFormData();
        $.ajax({
            url: '{{ route('submit.forms') }}'
            , type: 'POST'
            , data: {
                _token: '{{ csrf_token() }}'
                , formDataArray: formDataArray
            }
            , success: function(response) {
                console.log(response.message);
            }
            , error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function sendFormData() {
        var formDataArray = collectFormData();
        $.ajax({
            url: '{{ route('submit.forms') }}'
            , type: 'get'
            , data: {
                _token: '{{ csrf_token() }}'
                , formDataArray: formDataArray
            }
            , success: function(response) {
                console.log(response.message);
            }
            , error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function add_more() {
        var newModalBody = $('.card-body:first').clone(true);
        var checkNumberFields = $('.card-body').find('.check-number-details');
        var maxCheckNumber = 0;
        checkNumberFields.each(function() {
            var checkNumber = parseInt($(this).val());
            if (!isNaN(checkNumber) && checkNumber > maxCheckNumber) {
                maxCheckNumber = checkNumber;
            }
        });
        var modalBodyCount = $('.card-body').length + 1;
        var newCheckNumber = maxCheckNumber + 1;
        newModalBody.find('.check-number-details').val(newCheckNumber);
        newModalBody.find('input, select').not('.check-number-details, .check-date-details').val('');
        newModalBody.find('textarea.memo-details').val('');
        newModalBody.find('input, select').each(function() {
            if ($(this).attr('name') == 'user' || $(this).attr('name') == 'payee') {
                if ($(this).attr('name') == 'user') {
                    $(this).next().remove();
                    var selectDropdown = $('<select style="width: 100%">' + $('#accounts').html() +
                        '</select>', {
                            'id': newId
                            , 'name': newName
                            , 'class': 'select-2'
                        });
                    $(this).parent().append(selectDropdown);
                    $(this).remove();
                    selectDropdown.select2();
                }
            } else {
                var oldId = $(this).attr('id');
                var oldName = $(this).attr('name');
                var newId = oldId + '_' + modalBodyCount;
                var newName = oldName + '_' + modalBodyCount;
                $(this).attr('id', newId);
                $(this).attr('name', newName);
            }
        });
        var removeButton = $('<button/>', {
            text: 'X'
            , type: 'submit'
            , class: 'btn'
            , style: 'float: right'
            , click: function() {
                $(this).parent().remove();
            }
        });
        newModalBody.prepend(removeButton);
        newModalBody.insertAfter(".card-body:last");
    }
</script>
