<main class="row d-flex">
    <div class="col-2 d-flex flex-column">
        <ul class="row" id="users">
        </ul>
    </div>
    <div class="col-10 d-flex align-items-center justify-content-center flex-column">
        <div class="row" style="width: 100%;">
            <div class="col-12" id="messageContainer">
                <div class="row" id="messages">
                </div>
            </div>
        </div>
        <div class="row">
            <form class="col-12">
                <input style="width: 50vw;" type="text" placeholder="..." id="messageBar">
                <i id="send" class="fa-regular fa-paper-plane"></i>
            </form>
        </div>
    </div>
</main>
<script>
    var conn = new WebSocket('ws://localhost:1000?user=<?=session()->get('id')?>');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        let data = JSON.parse(e.data)
        console.log(data)
        if ('users' in data) {
            newUser(data.users)
        } else if ('message' in data) {
            newMessage.incoming(data)
        }
    };

    document.getElementById("send").addEventListener('click', function() {
        let message = document.getElementById("messageBar").value
        if (message != "") {
            conn.send(message)
            newMessage.outgoing(message)
        }
        document.getElementById("messageBar").value = ""
    })

    let newMessage = {
        incoming: function(e) {
            let div = document.createElement('div');
                div.setAttribute('class', 'col-8 d-flex justify-content-start');
                div.setAttribute('style', 'width: 100%');
                div.innerHTML = 
                    `<div style="background-color:grey; border-radius:1vw;" class="d-flex align-items-center justify-content-center">
                        <img style="width: 2vw; padding-right:1vw;" src="assets/img/logo.png">
                        <p class="my-1">${e.data}</p>
                    </div>`
            document.getElementById("messages").append(div)
        },

        outgoing: function(message) {
            let div = document.createElement('div');
                div.setAttribute('class', 'col-8 d-flex justify-content-end');
                div.setAttribute('style', 'width: 100%');
                div.innerHTML = 
                    `<div style="background-color:blue; border-radius:1vw;" class="d-flex align-items-center justify-content-center">
                        <p class="my-1">${message}</p>
                        <img style="width: 2vw; padding-left:1vw;" src="assets/img/logo.png">
                    </div>`
            document.getElementById("messages").append(div)
        }
    }

    function newUser(users) {
        /*<#?php for ($x = 0; $x < $activeConnections; $x ++) { ?>
            <#?php if ($otherConnections[$x]['userID'] != $userID) { ?>
                let li = document.createElement('li');
                li.setAttribute('class', 'col-12 d-flex align-items-center justify-content-center'); 
                li.innerHTML = '<a><img style="width: 10vw" src="/assets/img/<#?= $otherConnections[$x]['name'] ?>.png" alt="<#?= $otherConnections[$x]['name'] ?>"></a>'
                document.getElementById("users").append(li)
            <#?php }
        }?>*/
        let inner = ""
        document.getElementById("users").innerHTML = ""
        for (let x = 0; x < users.length; x++) {
            if(<?=session()->get('id')?> != users[x].userID) {
                inner = document.createElement('li');
                inner.setAttribute('class', 'col-12 d-flex align-items-center justify-content-center'); 
                inner.innerHTML = '<a><img style="width: 10vw" src="/assets/img/'+users[x].name+'.png" alt="'+users[x].name+'"></a>'
                document.getElementById("users").append(inner)
            }
        }

        if (inner == "") {
            inner = document.createElement('p');
            inner.innerHTML = "Nobody Active"
        }

        document.getElementById("users").append(inner)
    }
</script>