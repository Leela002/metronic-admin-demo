<x-base-layout>

    {{ theme()->getView('pages/identity/index', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

    {{ theme()->getView('pages/identity/profile/create', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

</x-base-layout>