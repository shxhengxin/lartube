@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $channel->name }}</div>
                    <div class="card-body">
                        <form method="post" id="update-channel-form" action="{{route('channels.update',$channel->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row justify-content-center">
                                <div class="channel-avatar">
                                    <div onclick="document.getElementById('image').click();" class="channel-avatar-overlay">
                                        <svg t="1585626696875" class="icon" viewBox="0 0 1025 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4242" width="48" height="48"><path d="M898.568943 954.284905 125.431057 954.284905C56.265406 954.284905 0 898.013654 0 828.848003L0 398.57488c0-84.322123 58.989246-156.357741 141.014225-173.238532l0-34.87216c0-8.072151 6.540722-14.612873 14.612873-14.612873L215.978263 175.851314c8.072151 0 14.612873 6.540722 14.612873 14.612873l0 33.673905 21.948535 0 64.103751-107.655958c17.173048-28.851657 48.701783-46.767039 82.27632-46.767039l226.166358 0c33.568692 0 65.097427 17.921227 82.27632 46.767039l64.103751 107.655958 103.874147 0c0.847547 0 1.695093 0.075987 2.53095 0.222116 84.678677 14.88175 146.140421 88.150695 146.140421 174.214672l0 430.273124C1024 898.013654 967.734594 954.284905 898.568943 954.284905zM149.974838 253.369683C79.932415 266.275772 29.225746 327.147156 29.225746 398.57488l0 430.273124c0 53.050574 43.154737 96.205311 96.205311 96.205311l773.137886 0c53.050574 0 96.205311-43.160582 96.205311-96.205311L994.774254 398.57488c0-71.433569-50.706669-132.299107-120.749092-145.211042l-110.87079 0c-5.149576 0-9.919218-2.712149-12.555381-7.136927L682.245816 131.434025c-11.935795-20.043017-33.843414-32.493184-57.165559-32.493184L398.919743 98.940841c-23.327991 0-45.229765 12.450168-57.165559 32.493184L273.401009 246.226911c-2.636162 4.424778-7.405804 7.136927-12.555381 7.136927L149.974838 253.363838zM170.239971 224.143937l31.12542 0 0-19.061032-31.12542 0L170.239971 224.143937zM512 863.521428c-147.47896 0-267.468183-119.983378-267.468183-267.468183s119.983378-267.468183 267.468183-267.468183c147.484805 0 267.468183 119.983378 267.468183 267.468183S659.484805 863.521428 512 863.521428zM512 357.804964c-131.369729 0-238.242437 106.878553-238.242437 238.242437s106.872708 238.242437 238.242437 238.242437 238.242437-106.878553 238.242437-238.242437S643.363883 357.804964 512 357.804964zM512 785.81017c-104.628171 0-189.751079-85.122908-189.751079-189.756924 0-104.628171 85.122908-189.756924 189.751079-189.756924s189.756924 85.122908 189.756924 189.756924C701.756924 700.687262 616.628171 785.81017 512 785.81017zM512 435.522068c-88.51894 0-160.525333 72.012238-160.525333 160.531178s72.012238 160.531178 160.525333 160.531178 160.531178-72.012238 160.531178-160.531178S600.513095 435.522068 512 435.522068zM397.984519 614.313492c-7.516862 0-13.89392-5.728246-14.536886-13.344476-0.163664-1.917209-3.565541-47.468457 30.850698-88.922255 34.018768-40.980341 89.483389-46.363724 91.821449-46.574149 8.031235-0.765715 15.133091 5.219718 15.852045 13.256798 0.718953 8.03708-5.219718 15.138936-13.256798 15.852045-0.415006 0.040916-45.820125 4.670274-71.936251 36.128867-26.513597 31.94374-24.233989 67.523164-24.204763 67.879718 0.59036 8.019545-5.406763 15.045414-13.420463 15.67669C398.767769 614.301801 398.376144 614.313492 397.984519 614.313492zM881.156244 427.864922l-47.19958 0c-30.616892 0-55.528918-24.912026-55.528918-55.528918l0-5.576272c0-30.616892 24.912026-55.528918 55.528918-55.528918l47.19958 0c30.616892 0 55.528918 24.912026 55.528918 55.528918L936.685161 372.336005C936.685161 402.952896 911.773135 427.864922 881.156244 427.864922zM833.956664 340.462406c-14.501815 0-26.303171 11.801356-26.303171 26.303171L807.653492 372.336005c0 14.501815 11.801356 26.303171 26.303171 26.303171l47.19958 0c14.501815 0 26.303171-11.801356 26.303171-26.303171l0-5.576272c0-14.501815-11.801356-26.303171-26.303171-26.303171L833.956664 340.456561z" p-id="4243" fill="#ffffff"></path></svg>
                                    </div>
                                    <img src="{{$channel->image()}}">
                                </div>
                            </div>



                            <input type="file"  onchange="document.getElementById('update-channel-form').submit();" id="image" style="display: none;" name="image" />

                            <div class="form-group">
                                <label for="name"  class="form-check-label">{{__("频道名")}}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old("name")?:$channel->name}}">
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-check-label">{{__("频道描述")}}</label>
                                <textarea id="description" name="description" class="form-control"> {{$channel->description}} </textarea>
                            </div>

                            <button class="btn btn-info" type="submit">保存</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
