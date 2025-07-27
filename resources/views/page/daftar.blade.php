@extends('layouts.master')
@section('title')
    Halaman Daftar
@endsection()
@section('h2')
    Register
@endsection
@section('content')
    <form method="POST" action="/welcome">
        @csrf

        <label>First Name:</label> <br />
        <input type="text" name="firstname" /><br /><br>
        <label>Last Name:</label> <br />
        <input type="text" name="lastname" /> <br />
        <br />
        <label>Gender:</label> <br />
        <input type="radio" value="1" /> Male <br />
        <input type="radio" value="2" /> Female <br />
        <input type="radio" value="2" /> Other <br />
        <br />

        <label>Nationality:</label> <br />
        <select name="kota">
            <option value="1">Indonesia</option>
            <option value="2">Rusia</option>
            <option value="3">China</option>
            <option value="4">Amerika</option>
            <option value="5">Singapura</option>
        </select>
        <br />
        <br />

        <label>Leaguage Spoken:</label> <br />
        <input type="checkbox" value="1" name="skill" />Bahasa Indonesia <br />
        <input type="checkbox" value="2" name="skill" />English <br />
        <input type="checkbox" value="3" name="skill" />Other<br />
        <br />
        <label>Bio:</label><br />
        <textarea name="bio" cols="35" rows="10"></textarea><br>
        <input type="submit" value="Sign Up" />
    </form>
@endsection
