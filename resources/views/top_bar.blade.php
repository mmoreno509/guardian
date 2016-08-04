<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ProjectGuardian</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/expenses">Expenses</a></li>
                <li><a href="/about">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User name <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Settings</li>
                        <li><a href="/auth/sign_out">Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/auth/sign_out">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>