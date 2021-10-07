<?php include __DIR__ . './../../partials/header.php'; ?>

    <div class="container">

        <div class="col-6  shadow p-3 mb-5 bg-white rounded p-4 m-auto mt-lg-5">
            <div class="text-center">
                <h1 class="mt-3 mb-3">Login</h1>
            </div>
            <form action="/login" method="POST">
                <div class="mb-4">
                    <input class="form-control form-control-lg" type="text" name="email" placeholder="Email" aria-label=".form-control-lg example">
                </div>
                <div class="mb-4">
                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" aria-label=".form-control-lg example">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary pl-5 pr-5 mt-2" type="submit">Login</button>
                </div>
            </form>
        </div>

    </div>

<?php include __DIR__ . './../../partials/footer.php'; ?>