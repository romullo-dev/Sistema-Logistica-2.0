<!doctype html>
<html lang="pt-br">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
        <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" id="nome" class="form-control" placeholder="Ex.: João da Silva" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" class="form-control" placeholder="Ex.: 123.456.789-00" maxlength="14" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cnh" class="form-label">Número da CNH</label>
                    <input type="text" id="cnh" class="form-control" placeholder="Ex.: 12345678901" maxlength="11" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="categoriaCnh" class="form-label">Categoria da CNH</label>
                    <select id="categoriaCnh" class="form-select" required>
                        <option value="">Selecione...</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validadeCnh" class="form-label">Validade da CNH</label>
                    <input type="date" id="validadeCnh" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" id="telefone" class="form-control" placeholder="Ex.: (11) 91234-5678" maxlength="15" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" id="endereco" class="form-control" placeholder="Ex.: Rua das Flores, 123 - São Paulo/SP" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Cadastrar Motorista</button>
                <button type="reset" class="btn btn-danger">Limpar Campos</button>
            </div>
        </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
