<?php   

// if (!isset($_SESSION['cust_login']) || $_SESSION['cust_login'] != 'true') {
// 	echo "<script> window.location.href='".base_url()."'</script>";
// }



?>




<hr>
<div class="container">

    <h2 class="mobile-text"><b>What is AMS?</b></h2>
    <p>AMS stands for Assignment Management System. Basically it is developed for proper management of assignment and
        notes. Teachers and Students can interact anytime they want.We can share notes,videos,slides,photos,zip
        files,pdf etc through this platform.</p>
    <h2 class="mobile-text"><b>How to use?</b></h2>

    <p><b>Teachers</b> section is accessible to authorized teachers only. Only after logged in, features of teacher are
        accessible.In this platform there are three sections :</p>
    <ol class="">
        <b style="color: blue;">
            <li>Create Assignment</li>
        </b>
        <b style="color: blue;">
            <li>View Assignment</li>
        </b>
        <b style="color: blue;">
            <li>Share Notes</li>
        </b>

    </ol>
    <p>In <b>Create Assignment </b> section teacher can assign an assignment to particular <em
            style="color:purple">semester's students</em> and of particular <em style="color:purple">subject.</em></p>

    <p>In <b>View Assignment </b> section teacher gets an assignment submitted by students.You can download these
        assignments simply by clicking at 'Download' button </p>

    <p>In <b>Share Notes </b> section teachers can share notes (videos,photos,slides,zip files etc) to particular <em
            style="color:purple">semester's students</em> and of particular <em style="color:purple">subject.</em></p>


    <p><b>Students</b> section is accessible with students username,password and semester in which that user is
        currently studying. Username, password and semester must match to get in. Students can create their own account
        by clicking at sign up button if they don't have account.In this platform there are aslo three sections :</p>
    <ol class="">
        <b style="color: blue;">
            <li>Submit Assignment</li>
        </b>
        <b style="color: blue;">
            <li>View Assignment</li>
        </b>
        <b style="color: blue;">
            <li>Get Notes</li>
        </b>

    </ol>
    <p>In <b>Submit Assignment </b> section student can submit the assignment which is assigned by particular subject
        teacher. When a student selects a subject the assignment assigned for that subject displays in the list if there
        is any otherwise it displays an error message. <b>Submitted By</b> field is auto filled according to the user_id
        you entered to log in.There must be an assignment to submit otherwise you can't. </p>

    <p>In <b>View Assignment </b> section you can get all the assignments which are assigned to you. You can use filter
        option to get subjectwise assignment. You can download your assignment simply by clicking at 'Download' button.
    </p>

    <p>In <b>Get Notes </b>section you can get all notes(videos,photos,slides,zip files etc) shared by your teacher.You
        can use filter option to get subjectwise notes.Also you can download these notes simply by clicking at
        'Download' button</p>


</div>