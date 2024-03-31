<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    </head>
    <body>
        <section class = "columns">
            <div class = "column card is-11-desktop mt-6 is-offset-0 ml-6">
                <h1 class = "has-text-centered is-centered has-text-weight-bold is-size-3">RESERVATION LIST</h1>
                <br>
                <header class="card-header-title ml-6">Search For A Customer</header>
                <form action="" method="GET">
                    <div class = "is-flex ml-6">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input ml-1 name" type="text" placeholder="Search for customers" name="name">
                            <span class="icon is-small is-left">
                            <img src="icon/check.png"  width="28px"/>
                            </span>
                            <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                            </span> 
                        </p>
                        <button class="button is-primary ml-5" id="find">Search</button>
                        <button class="button is-info ml-5" id="show">Show All Data</button>
                        <button class="button is-dark ml-5" id="remove">Remove Display</button>
                    </div>
                    <div class="card-content" id="main">

                    </div>         
                </form>
            </div>
        </section>
        <script src="show.js" type="text/javascript"></script>
        <script src="remove.js"></script>
        <script src="admin.js"></script>
    </body>
</html>