
<form action="https://autoecoleuniversite.com/wecashup/payment" method="POST" id="wecashup">
    {{-- @csrf --}}
    <input type="hidden" name="training_id" value="{{ $training->id }}">
    <script async src="https://www.wecashup.com/library/MobileMoney.js" class="wecashup_button"
    data-demo
    data-sender-lang="fr"
    data-sender-phonenumber=""
    data-receiver-uid="oVLJd1IZlURWWyX2JJR0IfCSwqC2"
    data-receiver-public-key="pk_live_df3FRABCpT27ccDK"
    data-transaction-parent-uid=""
    data-transaction-receiver-total-amount="{{ $training->cost }}"
    data-transaction-receiver-reference="XVT2VBF"
    data-transaction-sender-reference="XVT2VBF"
    data-sender-firstname="{{ Auth::user()->name }}"
    data-sender-lastname=""
    data-transaction-method="pull"
    data-image="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}"
    data-name="Auto-école Université"
    data-crypto="false"
    data-cash="false"
    data-telecom="true"
    data-m-wallet="false"
    data-split="true"
    configuration-id="3"
    data-marketplace-mode="false"
    data-product-1-name="{{ $training->category->name }} : {{ $training->name }}"
    data-product-1-quantity="1"
    data-product-1-unit-price="594426"
    data-product-1-reference="XVT2VBF"
    data-product-1-category="Souscription"
    data-product-1-description=""
    >
    </script>
</form>
