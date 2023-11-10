                <div class="row">
                    <div class="col-md-6">
                        <div class="control-group focused">
                            <label class="form-label">Code</label>
                            {{ Form::text('code', null, ['class' => $errors->has('code') ? 'form-field error' : 'form-field', $readonly]) }}
                            @if ($errors->has('code'))
                                <p class="error-msg ta-right">{{ $errors->first('code') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="control-group focused">
                            {{ Form::select('type',
                            [COUPON_TYPE_FIXED => "Fixed",
                            COUPON_TYPE_PERCENT => "Percent",
                             ]) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="control-group focused">
                            <label class="form-label">BDM</label>
                            {{ Form::select('bdm',
                                [
                                    null => "No BDM",
                                    1 => "BDM 1 (Maaz)",
                                    2 => "BDM 2 (Asif)",
                                    3 => "BDM 3 (Imad)",
                                    4 => "BDM 4 (Humna)"
                                ]
                            )}}
                            @if ($errors->has('bdm'))
                                <p class="error-msg ta-right">{{ $errors->first('bdm') }}</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="control-group focused">
                            <label class="form-label">Amount</label>
                            {{ Form::number('amount', null, ['class' => $errors->has('amount') ? 'form-field error' : 'form-field','step' => '0.1','min' => '0.00']) }}
                            @if ($errors->has('amount'))
                                <p class="error-msg ta-right">{{ $errors->first('amount') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="control-group focused">
                            <label class="form-label">Status</label>
                            {!! Form::checkbox('status', 1, true) !!}
                        </div>
                    </div>

                </div>

                <div class="control-group ta-right">
                     {!! Form::submit($submitButtonText) !!}
                </div>
