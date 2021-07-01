<?php
/*
Template Name: transaction test
*/
get_header();

?>

<form action="Practice 2 form.html" class="form">
    <h1>Mandeep Neupanae</h1>
    <div class="title">
        <div class="row">
            <div class="col-2">
                <h6 class="trans-color">images</h6>
            </div>
            <div class="col-4">
                <h6 class="trans-color">citizenship</h6>
            </div>
            <div class="col-4">
                <h6 class="trans-color">document</h6>
            </div>
            <div class="col-2">
                <h6 class="trans-color">ID</h6>
            </div>
        </div>
    </div>
    <div class="Name">

        <label for="name">FirstName:</label>
        <input placeholder="First name" type="text">
        <label for="name">LastName:</label>
        <input placeholder="Last name" type="text">
    </div>
    <div class="RAmount">
        <label>RequiredAmount:</label>
        <input placeholder="Required Amount" type="value">
        <label>TotalCollectedAmount:</label>
        <input placeholder="Total Collected Amount" type="value"></br>
    </div>
    <div class="address">
        <label>Address:</label>
        <input placeholder="Address" type="text">
    </div>
    <div class="Amount">
        <label>Amount:</label>
        <input placeholder="Amount" type="value">
    </div>
    <div class="des">
        <label>Description:</label>
        <textarea row="4" col="10"></textarea>
    </div>
    <div class="submit">
        <input type="submit" value="Submit">
    </div>


</form>

<style>
body {
    background-color: rgb(54, 52, 52);


}

.Name,
.Amount,
.RAmount,
.address,
.des {
    display: inline-flex;

}

label {
    margin: 32px 8px 0px 10px;
    color: white;
    width: 100%;
}

.form {

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    transition: 0.25s;
    margin-top: 350px;
}

::placeholder {
    color: rgba(255, 255, 255, 0.534);
    font-weight: lighter;
    letter-spacing: 1.5px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 13px;
}

.form input[type="text"],
input[type="value"],
textarea {
    border: 1.5px solid #33FFFF;
    font-size: medium;
    letter-spacing: 2px;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    padding: 10px 10px;
    color: whitesmoke;
    width: 220px;
    border-radius: 24px;
    transition: 0.25s;
    outline: none;
}

.form input[type="text"]:hover,
input[type="value"]:hover,
textarea:hover {
    padding: 12px;
    border: 2px solid #0099FF;
    width: 260px;
}

.form input[type="submit"] {
    background-color: #b5bdbd;
    width: 200px;
    height: 40px;
    border: none;
    border-radius: 25px;
    margin: auto;
    padding: 8px 8px;
    outline: none;
    transition: 0.25s;
}

.form input[type="submit"]:hover {
    background-color: darkgrey;
    padding: 8px 8px;
    border: 1px solid #33FFFF;
}

h1 {
    color: white;
    letter-spacing: 5px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: normal;
    font-size: 35px;
    transition: 0.25s;
}

h1:hover {
    color: white;
    letter-spacing: 7px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: lighter;
}
h6.trans-color {
    color: #f1f1f1;
}
</style>