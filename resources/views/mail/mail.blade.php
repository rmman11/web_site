
#resources/views/mail.blade.php

<h2>Hello</h2> <br><br>
You have got an email from : {{ $data['name'] }} <br><br>
User details: <br><br>
Name: {{ $data['name'] }} <br>
Email: {{ $data['email'] }} <br>
Phone: {{ $data['phone'] }} <br>
Subject: {{ $data['subject'] }} <br>
Message: {{ $data['user_query'] }} <br><br>

<p>It would be pleasure to me if you check my resume which is attached to this mail</p>