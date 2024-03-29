<?php
use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;

function read_from_smart_contract($contract_address, $contract_ABI, $function_name, $function_input = '') {
    $web3 = new Web3(new HttpProvider(new HttpRequestManager(INFURA_ENDPOINT, 10)));

    $contract = new Contract($web3->provider, $contract_ABI);
    $contract->at($contract_address)->call($function_name, $function_input, function ($err, $res) {
        new_cookie('read_from_smart_contract', $res);
    });

    return get_cookie('read_from_smart_contract');    
}
?>