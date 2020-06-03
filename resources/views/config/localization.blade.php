<div class="col-12">
<div class="card">
<div class="card-body">
<form class="needs-validation" role="form" action="{{route('localizationPost')}}" method="post" novalidate enctype="multipart/form-data">
{{csrf_field()}}

  <div class="form-group">
<label for="Country">{{translate('Default_Country')}}</label>
<select name="country" class="form-control selectpicker" data-live-search="true">
{!!countries(app_config('Country'))!!}
</select>
</div>

  <div class="form-group">
                                    <label>{{translate('Date_Format')}}</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="date_format">
                                        <option value="d/m/Y" @if(app_config('DateFormat') == 'd/m/Y') selected="selected" @endif>15/05/2016</option>
                                        <option value="d.m.Y" @if(app_config('DateFormat') == 'd.m.Y') selected="selected" @endif>15.05.2016</option>
                                        <option value="d-m-Y" @if(app_config('DateFormat') == 'd-m-Y') selected="selected" @endif>15-05-2016</option>
                                        <option value="m/d/Y" @if(app_config('DateFormat') == 'm/d/Y') selected="selected" @endif>05/15/2016</option>
                                        <option value="Y/m/d" @if(app_config('DateFormat') == 'Y/m/d') selected="selected" @endif>2016/05/15</option>
                                        <option value="Y-m-d" @if(app_config('DateFormat') == 'Y-m-d') selected="selected" @endif>2016-05-15</option>
                                        <option value="M d Y" @if(app_config('DateFormat') == 'M d Y') selected="selected" @endif>May 15 2016</option>
                                        <option value="d M Y" @if(app_config('DateFormat') == 'd M Y') selected="selected" @endif>15 May 2016</option>
                                        <option value="jS M y" @if(app_config('DateFormat') == 'jS M y') selected="selected" @endif>15th May 16</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="tzone">{{translate('Timezone')}}</label>
                                    <select name="timezone" class="form-control selectpicker" data-live-search="true">
                                        @foreach (timezoneList() as $value => $label)
                                            <option value="{{$value}}" @if(app_config('Timezone')==$value) selected @endif>{{$label}}</option>
                                        @endforeach

                                    </select>
                                </div>
								
								  <div class="form-group">
                                    <label>{{translate('Currency_Code')}}</label>
                                    <input type="text" class="form-control" required name="currency_code" value="{{app_config('Currency')}}">
                                </div>

                                 <div class="form-group">
                                    <label>{{translate('default_language')}}</label>

                                     <select name="language" class="form-control" >
             <option value="english" {{app_config('language')=='english'?'selected':''}}>{{translate('english')}}</option>
            <option value="bangla" {{app_config('language')=='bangla'?'selected':''}}>{{translate('bangla')}}</option>
                                    </select>

                                   
                                </div>

                                <div class="form-group">
                                    <label>{{translate('Currency_Symbol')}}</label>
                                    <input type="text" class="form-control" required name="currency_symbol" value="{{app_config('CurrencyCode')}}">
                                </div>


                                <div class="form-group">
                                    <label for="currency_symbol_position">{{translate('Currency_Symbol_Position')}}</label>
                                    <select class="form-control selectpicker" name="currency_symbol_position">
                                        <option value="left" @if(app_config('currency_symbol_position') == 'left') selected="selected" @endif>{{translate('Left')}}</option>
                                        <option value="right" @if(app_config('currency_symbol_position') == 'right') selected="selected" @endif>{{translate('Right')}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cformat">{{translate('Currency_Format')}}</label>
                                    <select class="form-control selectpicker" name="cformat">
                                        <option value="1" @if (app_config('dec_point') == '.' AND app_config('thousands_sep') == '') selected="selected" @endif>1234.56</option>
                                        <option value="2" @if (app_config('dec_point') == '.' AND app_config('thousands_sep') == ',')  selected="selected" @endif>1,234.56</option>
                                        <option value="3" @if (app_config('dec_point') == ',' AND app_config('thousands_sep') == '') selected="selected" @endif>1234,56</option>
                                        <option value="4" @if (app_config('dec_point') == ',' AND app_config('thousands_sep') == '.')  selected="selected" @endif>1.234,56</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="currency_decimal_digits">{{translate('Currency_Decimal_Digits')}}</label>
                                    <select class="form-control selectpicker" name="currency_decimal_digits">
                                        <option value="false" @if(app_config('currency_decimal_digits') == 'false')  selected="selected" @endif>0 (e.g. 100)</option>
                                        <option value="true" @if(app_config('currency_decimal_digits') == 'true') selected="selected" @endif>2 (e.g. 100.00)</option>
                                    </select>
                                </div>


<button class="btn btn-primary btn-block" type="submit">{{translate('submit')}}</button>
</form>

</div>
</div>
</div>
               