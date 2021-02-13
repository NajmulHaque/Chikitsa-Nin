@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h1>{{$title}}</h1>

<hr>
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
    <p>{{\Session::get('success')}}</p>
</div>
@endif
<label><strong>Please select your role : </strong></label>
<tr>
    <td><select class="form" name="form" selected="selected" id="myselect">
            <option value="">--Please Select--</option>
            <option value="form1">Patient</option>
            <option value="form2">Doctor</option>
            <option value="form3">Admin</option>
        </select>
    </td>
</tr>
<form name="form1" id="form1" style="display:none" method="POST" action="{{route('patient-profile')}}" enctype="multipart/form-data">
    @csrf
    <table cellpadding="10">
        @if (auth()->user())
        <!----- Patient's Name ---------------------------------------------------------->
        <tr>
            <td>PATIENT'S NAME</td>
            <td><input type="text" name="name" value="{{auth()->user()->name}}" readonly>
                <!----- <input type="text" name="Ptname" maxlength="40"/>(max 40 characters)------------>
            </td>
        </tr>


        <!-----Patient's ID--------------------------------------------------------->
        <tr>
            <td>PATIENT'S ID</td>
            <td><input type="text" name="id" value="{{Auth::user()->id}}" readonly></td>
        </tr>

        @endif

        <!----- Age -------------------------------------------------------->
        <tr>
            <td>PATIENT'S AGE</td>
            <td><input type="text" name="age" required/></td>
        </tr>

        <!----- Gender ----------------------------------------------------------->
        <tr>
            <td>GENDER</td>
            <td>
                Male <input type="radio" name="gender" value="Male" required />
                Female <input type="radio" name="gender" value="Female" required />
                Others <input type="radio" name="gender" value="others" required />
            </td>
        </tr>

        <!----- Religion ---------------------------------------------------------->
        <tr>
            <td>PATIENT'S RELIGION</td>
            <td><input type="text" name="religion" required /></td>
        </tr>

        <!----- Marital Status ---------------------------------------------------------->
        <tr>
            <td>MARITAL STATUS</td>
            <td><select name="marital_status" id="relation" required>
                    <option value="">select</option>
                    <option value="unmarried">Unmarried</option>
                    <option value="married">Married</option>
                </select>
            </td>
        </tr>

        <!----- Mobile Number ---------------------------------------------------------->
        <tr>
            <td>CONTACT NUMBER</td>
            <td>
                <input type="text" name="phone" required />
            </td>
        </tr>



        <!----- Address ---------------------------------------------------------->
        <tr>
            <td>ADDRESS</td>
            <td><input name="address" type="text" required /></td>
        </tr>

        <!----- Submit and Reset ------------------------------------------------->
        <tr>
            <td>
               <button type="submit" class="btn btn-info">Save</button>
            </td>
        </tr>
    </table>
</form>



<form name="form2" id="form2" style="display:none" method="POST" action="{{route('doctor-profile')}}" enctype="multipart/form-data">
    @csrf
    <table cellpadding="10">
        @if (auth()->user())
        <!----- Doctor's Name ---------------------------------------------------------->
        <tr>
            <td>DOCTOR'S NAME</td>
            <td><input type="text" name="name" value="{{auth()->user()->name}}" readonly>
                <!----- <input type="text" name="Ptname" maxlength="40"/>(max 40 characters)------------>
            </td>
        </tr>


        <!-----Doctor's ID--------------------------------------------------------->
        <tr>
            <td>DOCTOR'S ID</td>
            <td><input type="text" name="name" value="{{auth()->user()->id}}" readonly>
            </td>
        </tr>

        @endif
        <!----- Gender ----------------------------------------------------------->
        <tr>
            <td>GENDER</td>
            <td>
                Male <input type="radio" name="gender" value="Male" required/>
                Female <input type="radio" name="gender" value="Female" required/>
                Others <input type="radio" name="gender" value="others" required/>
            </td>
        </tr>


        <!----- Doctor Speciality ---------------------------------------------------------->
        <tr>
            <td>DOCTOR'S SPECIALITY </td>
            <td><input type="text" name="speciality" required/></td>
        </tr>

        <!----- Mobile Number ---------------------------------------------------------->
        <tr>
            <td>CONTACT NUMBER</td>
            <td>
                <input type="text" name="phone" required />
            </td>
        </tr>

        <!----- Submit and Reset ------------------------------------------------->
        <tr>
            <td>
               <button type="submit" class="btn btn-success">Save</button> 
            </td>
        </tr>
    </table>
</form>




<form name="form3" id="form3" style="display:none" method="POST" action="{{route('admin-profile')}}">
    @csrf
    <table cellpadding="10">
        @if (auth()->user())
        <!----- Admin's Name ---------------------------------------------------------->
        <tr>
            <td>ADMIN'S NAME</td>
            <td><input type="text" name="name" value="{{auth()->user()->name}}" readonly>
                <!----- <input type="text" name="Ptname" maxlength="40"/>(max 40 characters)------------>
            </td>
        </tr>

        <!-----Admin's ID--------------------------------------------------------->
        <tr>
            <td>ADMIN'S ID</td>
            <td><input type="text" name="name" value="{{auth()->user()->id}}" readonly>
            </td>
        </tr>

        @endif

        <!----- Gender ----------------------------------------------------------->
        <tr>
            <td>GENDER</td>
            <td>
                Male <input type="radio" name="gender" value="Male" required/>
                Female <input type="radio" name="gender" value="Female" required/>
                Others <input type="radio" name="gender" value="others" required/>
            </td>
        </tr>
        <!----- Mobile Number ---------------------------------------------------------->
        <tr>
            <td>CONTACT NUMBER</td>
            <td>
                <input type="text" name="phone" maxlength="16" required/>
            </td>
        </tr>
        <!----- Submit and Reset ------------------------------------------------->
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-success">Save</button>
            </td>
        </tr>
    </table>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $("select").on("change", function() {
            $("#" + $(this).val()).show().siblings().hide();
        });
    });
</script>
@endsection