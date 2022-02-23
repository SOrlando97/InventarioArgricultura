@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel condimentum massa, sed mattis turpis. Duis id pulvinar ipsum, sed porttitor nunc. Curabitur hendrerit gravida lorem, in pharetra velit aliquet et. Nullam nibh ipsum, cursus vel ex nec, dapibus tincidunt diam. Curabitur eu lacus lorem. Aliquam ac risus dui. Proin in quam quis libero accumsan tristique vitae ac diam. Fusce accumsan et turpis ut volutpat. Nam ut hendrerit lorem. Duis id ullamcorper elit. Pellentesque elementum ex in ligula tristique, viverra fringilla elit interdum. Nulla porta fringilla nulla dignissim posuere.

Quisque in urna fermentum, euismod mi quis, vestibulum ipsum. Suspendisse ac facilisis dolor. Donec aliquet ante et nunc vestibulum, ut ullamcorper massa convallis. Donec metus orci, lacinia nec egestas nec, euismod vitae tellus. Integer convallis feugiat elit, quis fringilla ipsum vulputate at. Nulla mattis nulla neque, in congue leo dignissim eget. Cras luctus tortor leo, sit amet auctor metus gravida in. Donec bibendum sagittis vulputate. Suspendisse iaculis ac leo sit amet sagittis. Donec commodo euismod placerat. Nulla facilisi. Ut erat nibh, egestas vitae iaculis eu, egestas quis tortor.

Proin leo mi, tristique in suscipit at, auctor sed magna. Maecenas bibendum orci lorem, eget imperdiet nisl laoreet ac. Nunc ac urna ac elit lobortis interdum eu mollis dolor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Nunc et dignissim dolor. Sed venenatis augue rhoncus, condimentum lorem id, commodo arcu. Quisque sit amet maximus ligula. Sed suscipit sed turpis non facilisis. Integer vel lectus tortor. Donec lorem dolor, consectetur a lobortis in, condimentum vel nunc. Quisque interdum, nisi id accumsan malesuada, velit leo dapibus magna, in elementum magna ante eu diam.

Fusce facilisis dapibus venenatis. Mauris pellentesque orci vel ligula facilisis iaculis. Nunc varius molestie ultrices. Vestibulum vel dui pulvinar, blandit arcu eget, rhoncus odio. Nam gravida a tortor a consequat. In quis orci nulla. Nulla non erat rutrum, bibendum erat at, eleifend tortor. Sed tellus lectus, fringilla quis risus non, tempor aliquet ex. Cras nec massa faucibus, porttitor nisl in, eleifend turpis. Donec odio libero, ullamcorper dignissim metus ac, pellentesque interdum eros. Curabitur vel ex id odio lobortis tristique in et orci. Nunc a nisl sed orci eleifend mattis sed eu lectus. Phasellus posuere ipsum quis commodo feugiat. Ut suscipit est feugiat elit euismod, a accumsan risus molestie.

Morbi tincidunt pretium lectus non aliquet. Mauris vel odio viverra, elementum metus vitae, tempus erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla blandit eleifend interdum. Integer sit amet tempor leo. Sed eu finibus massa. Vestibulum rutrum erat augue, non vulputate risus maximus nec. Integer faucibus cursus interdum. Donec tempus id erat eget accumsan. Quisque rhoncus orci ut turpis tempus vestibulum. Morbi cursus risus in sem mattis mollis.

Ut et auctor leo. Maecenas interdum feugiat mauris, ut malesuada metus. In hac habitasse platea dictumst. Phasellus vitae dui eu neque hendrerit varius. Ut volutpat, ante in ultrices imperdiet, magna velit bibendum felis, egestas sollicitudin nunc erat at ipsum. Ut in mattis mauris. Donec molestie, ante a iaculis tristique, dui leo tempus nisi, vel gravida erat sem sed sapien. Praesent quis tellus vitae eros congue semper. Donec sapien tortor, maximus vel placerat eget, luctus eu risus. Praesent fermentum magna quis eros vestibulum consequat. Mauris consectetur convallis risus non accumsan. Suspendisse potenti. Aenean lacinia nibh a tempor ultricies. Nullam vestibulum condimentum ex, id posuere ligula scelerisque a.

Sed fringilla ac ex ut varius. Praesent eleifend tristique dui sed aliquet. Nulla consequat nec odio sit amet tincidunt. Morbi egestas ut arcu eu mattis. Pellentesque dictum quam eget sem aliquam, non elementum risus auctor. Fusce nunc orci, malesuada sollicitudin odio a, dictum lobortis risus. Proin vehicula mi et imperdiet feugiat. Ut at vestibulum lacus. Suspendisse potenti. Cras ut nunc eu neque laoreet finibus sed fermentum massa. Phasellus id ante augue. Donec volutpat sit amet est vel aliquam. Pellentesque dapibus elit id justo aliquet, vel sagittis arcu posuere.

Maecenas magna ex, elementum et dignissim a, cursus id arcu. Fusce sagittis eros ac nisi rutrum imperdiet. Aliquam erat volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed viverra metus. Mauris viverra consequat laoreet. Fusce in ex euismod, faucibus ex et, facilisis odio. Curabitur imperdiet nec sem ut lobortis. Fusce molestie, augue sit amet ornare varius, nunc nibh bibendum turpis, non accumsan diam orci et velit. Nullam porttitor vitae enim vel suscipit. Mauris arcu erat, efficitur non egestas vitae, iaculis eu ligula. Nullam pulvinar consectetur eros, sed aliquam augue pretium a. Donec in odio a eros hendrerit auctor. Duis pulvinar justo eu ligula laoreet faucibus.

Aenean nulla neque, semper vitae rutrum sed, varius vitae nunc. Morbi pharetra massa ut condimentum rutrum. Sed non nulla dolor. Praesent varius efficitur ligula sed luctus. Donec eleifend ultrices leo, nec bibendum enim blandit a. Donec quis consequat ligula, at finibus purus. Mauris non euismod neque. Donec molestie ipsum id magna elementum, ut mollis diam egestas. Donec at cursus ante.

Nunc condimentum sem eget elit facilisis condimentum. Curabitur suscipit nunc leo, a dignissim orci volutpat eget. Sed at augue eget justo rhoncus vehicula. Cras vitae mi vitae erat rutrum aliquet. Nam ultricies eros gravida metus facilisis porta. Curabitur efficitur metus nibh, vel accumsan libero fermentum eget. Suspendisse bibendum posuere sollicitudin. Nunc pretium in est vitae sodales. Duis pulvinar rutrum arcu euismod consectetur. Aliquam tellus velit, congue vel tincidunt condimentum, aliquam vel turpis.

Donec sed metus sem. In quis purus consequat, gravida dui ut, consectetur neque. Vestibulum non eros tincidunt, pharetra tortor sit amet, auctor erat. Phasellus pharetra mauris at tortor lacinia commodo eu sit amet diam. Sed feugiat lobortis lorem, at commodo est pharetra in. Pellentesque fermentum at arcu id rhoncus. Nunc sagittis lacinia sapien rhoncus pellentesque.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam ut lobortis arcu, in pellentesque lorem. Aliquam commodo, lectus id hendrerit accumsan, mauris arcu cursus augue, sed imperdiet purus turpis feugiat massa. Donec vestibulum ac massa vitae consectetur. Morbi volutpat, tortor ac tincidunt varius, dolor eros euismod sapien, ac pharetra ligula ipsum a neque. Proin molestie libero sit amet elementum commodo. Aliquam pellentesque ultricies ipsum eget ullamcorper.

Vivamus dictum cursus velit, in porttitor justo. Aliquam tincidunt nulla non laoreet rutrum. Duis scelerisque nunc eu justo iaculis, ac dignissim dolor bibendum. Sed blandit lobortis commodo. Mauris tristique consectetur eleifend. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent sit amet laoreet erat. Morbi rutrum id quam vitae pulvinar. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin tempor, magna quis volutpat convallis, ante metus rhoncus enim, in ultricies massa neque sed lacus. Fusce id gravida turpis.

Praesent ac metus risus. Pellentesque non purus tristique, elementum nibh nec, vestibulum metus. Pellentesque eleifend orci sapien, eu sodales libero rutrum sit amet. Etiam feugiat ligula metus, a mollis nulla pulvinar sit amet. Cras tincidunt lobortis ullamcorper. Vestibulum a efficitur tortor. Donec ultricies diam in turpis luctus tristique. Aliquam erat volutpat. In in ultrices dolor. Ut venenatis vel eros iaculis ullamcorper. Maecenas euismod vestibulum volutpat. Ut ultricies sit amet dui et venenatis. Etiam ultricies auctor turpis. Etiam quis mi in dui semper elementum sit amet non nisi. Maecenas magna leo, scelerisque eu odio quis, vulputate sodales ante.

Mauris finibus rhoncus leo sed tempor. Vestibulum sit amet nibh non mi egestas tempor. Etiam suscipit tincidunt nulla non tincidunt. Nulla gravida, felis sed auctor gravida, augue odio cursus leo, non ullamcorper magna sem consectetur arcu. Duis sed diam porta, porttitor nunc tincidunt, gravida metus. Nunc vitae orci vitae orci gravida bibendum. Nam dignissim pulvinar rhoncus. Phasellus vel ornare massa. Vestibulum vel augue a tellus sollicitudin tempor.

Pellentesque in lorem vulputate, vestibulum dolor et, molestie enim. Pellentesque accumsan velit sit amet sodales laoreet. Aenean ac finibus leo. Morbi rhoncus risus nec quam blandit, a ultricies justo malesuada. Fusce id odio euismod, hendrerit justo non, dapibus leo. Curabitur a ornare risus. Integer vestibulum luctus nulla id semper. Nunc ac augue dapibus, ornare nibh quis, viverra tortor. Aliquam nec hendrerit tellus. Suspendisse vehicula leo sapien, nec aliquet enim lobortis ut. In vel odio ipsum. Vestibulum egestas libero lorem, ac ullamcorper turpis sodales et.

Phasellus non rutrum metus. Donec consequat interdum mauris et efficitur. Aliquam porttitor molestie turpis et sollicitudin. Mauris aliquam arcu sed libero eleifend imperdiet. Phasellus tincidunt viverra ornare. Phasellus tempor suscipit justo, id vehicula quam gravida eget. Nam a urna sed risus semper malesuada. Aliquam egestas lectus ligula, ac fringilla enim lacinia vel. Pellentesque eget nibh et purus rhoncus ornare vitae ac arcu. Duis faucibus erat nec odio ultrices condimentum.

Nullam quis pharetra felis. Phasellus aliquam tristique elit, eu bibendum lorem ornare eu. Vestibulum gravida rhoncus libero in iaculis. Mauris a urna euismod, viverra diam vel, tempor est. Sed eget quam arcu. Praesent suscipit ut mi nec ornare. Mauris dictum mauris vitae elit finibus maximus. Nunc tempor tincidunt magna vel blandit. Aliquam eu posuere sapien, vitae eleifend nunc. Suspendisse ac bibendum mi. Integer lacus dui, laoreet in velit in, accumsan lobortis sem. Cras sed ligula ut libero consectetur sagittis sed non urna.

Morbi venenatis tellus in eros tristique porta. Nullam ac leo et ipsum ornare tristique. Nulla vestibulum condimentum tristique. Sed ac erat erat. Phasellus convallis, nulla ac condimentum faucibus, orci enim mattis est, quis ornare nisl sem et sapien. Cras nec nisi quis nulla pretium posuere ac et enim. Aenean feugiat scelerisque sapien, tincidunt mollis turpis fermentum id. Maecenas lobortis sapien eget arcu fermentum, et malesuada libero sollicitudin.

Maecenas eget gravida mi. Phasellus tincidunt quam et ligula auctor, vitae pellentesque lacus imperdiet. Aliquam ac pulvinar nunc. Morbi sed magna sed justo malesuada euismod. Integer tristique dapibus erat, sit amet consequat arcu bibendum ut. Nam luctus turpis sodales libero commodo, non euismod libero dignissim. Integer in odio id elit pulvinar ultricies. Aenean facilisis tempus dolor in vestibulum. Phasellus condimentum ultricies sagittis. In sit amet orci at ex congue lacinia. Aliquam arcu lectus, facilisis vitae lobortis fringilla, pharetra id ipsum. Maecenas quis condimentum massa, non viverra felis. Phasellus eu leo tempor, luctus nisl ut, pulvinar turpis. Integer posuere quam nulla, semper fermentum odio tincidunt sed. Sed placerat urna in ante semper cursus nec congue libero.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
