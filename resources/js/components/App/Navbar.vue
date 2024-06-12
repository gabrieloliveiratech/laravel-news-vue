<template>
    <nav style="background-color: #e1e1e1;" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand text-dark" href="/">Laravel News</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/news/create">Cadastrar Notícia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/categories">Exibir Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/categories/create">Cadastrar Categoria</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    name: 'Navbar'
}
</script>

<style scoped>
</style>