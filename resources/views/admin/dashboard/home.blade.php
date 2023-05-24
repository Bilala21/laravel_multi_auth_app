@extends("admin.layout.master")
@section('content')
    <div class="container">
        <div class="content">
            <h1 class="text-center pb-5 pt-4">This system suport multi auth</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea corrupti in harum, veritatis dolorem porro minus
                expedita nesciunt suscipit consequuntur aspernatur architecto quaerat dolores repellat aut vitae minima,
                maxime id nemo voluptatum exercitationem. Minima voluptatibus eveniet saepe cupiditate in. Enim, atque.
                Quasi a nemo libero? Similique distinctio sit dolore? Cupiditate, nam voluptates. Earum deserunt nobis
                numquam animi inventore a dolorum repellat autem molestias ratione nam, tempore atque at unde ipsa
                aspernatur explicabo voluptates eaque, ab magni natus? Assumenda culpa voluptatum dolor minima ipsa maxime
                recusandae deleniti rem magni dignissimos eligendi officia vel mollitia, illum architecto odit molestias
                excepturi ab animi?
            </p>

            <div class="text-center">
                <form action="{{ route("admin.logout") }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Log out</button>
                </form>                
            </div>
        </div>
    </div>
@endsection

@section("custom-script")
<script>
    $("form").on("submit", function(e){
        $("form").submit();
    })
</script>
@endsection
