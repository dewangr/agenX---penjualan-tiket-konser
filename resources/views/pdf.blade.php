<!DOCTYPE html>
<html lang="en">

<body>
    <div>
        <h1>Music Concert - agentX</h1>
        <hr>
        <hr> <br>
        <small>TICKET NUMBER</small>
        <h2>{{ $ticket->number }}</h2>
        <hr> <br>
        <small>NAME</small>
        <h2>{{ $ticket->nama }}</h2>
        <hr> <br>
        <small>DATE/TIME</small>
        <h2>31 December 2022 at 7 PM</h2>
        <hr> <br>
        <small>VENUE</small>
        <h2>GWK, Badung, Bali</h2>
        <hr> <br>
        <small>ORDERED AT</small>
        <h3>{{ $ticket->created_at }}</h3>
    </div>
</body>

</html>
