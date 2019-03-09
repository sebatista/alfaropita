<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="alfaropita.com">Alfaropita</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="listarCategorias">Categorias</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <form class="form-inline" action="pedidos/login" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </ul>
    </div>
</nav>