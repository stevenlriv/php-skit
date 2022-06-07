<?php
function get_eth_usd_price_chainlink() {
   $query = read_from_smart_contract('0x5f4eC3Df9cbd43714FE2740f5E3616155c5b8419', ABI_price_feeds_chainlink(), 'latestRoundData', '');
 
   $value = $query['answer']->value;
   $value = get_number_from_decimals(8, $value);
   $value = round($value, 2);

   return $value;
}

function ABI_price_feeds_chainlink() {
    return '[
        {
           "inputs":[
              
           ],
           "name":"decimals",
           "outputs":[
              {
                 "internalType":"uint8",
                 "name":"",
                 "type":"uint8"
              }
           ],
           "stateMutability":"view",
           "type":"function"
        },
        {
           "inputs":[
              
           ],
           "name":"description",
           "outputs":[
              {
                 "internalType":"string",
                 "name":"",
                 "type":"string"
              }
           ],
           "stateMutability":"view",
           "type":"function"
        },
        {
           "inputs":[
              {
                 "internalType":"uint80",
                 "name":"_roundId",
                 "type":"uint80"
              }
           ],
           "name":"getRoundData",
           "outputs":[
              {
                 "internalType":"uint80",
                 "name":"roundId",
                 "type":"uint80"
              },
              {
                 "internalType":"int256",
                 "name":"answer",
                 "type":"int256"
              },
              {
                 "internalType":"uint256",
                 "name":"startedAt",
                 "type":"uint256"
              },
              {
                 "internalType":"uint256",
                 "name":"updatedAt",
                 "type":"uint256"
              },
              {
                 "internalType":"uint80",
                 "name":"answeredInRound",
                 "type":"uint80"
              }
           ],
           "stateMutability":"view",
           "type":"function"
        },
        {
           "inputs":[
              
           ],
           "name":"latestRoundData",
           "outputs":[
              {
                 "internalType":"uint80",
                 "name":"roundId",
                 "type":"uint80"
              },
              {
                 "internalType":"int256",
                 "name":"answer",
                 "type":"int256"
              },
              {
                 "internalType":"uint256",
                 "name":"startedAt",
                 "type":"uint256"
              },
              {
                 "internalType":"uint256",
                 "name":"updatedAt",
                 "type":"uint256"
              },
              {
                 "internalType":"uint80",
                 "name":"answeredInRound",
                 "type":"uint80"
              }
           ],
           "stateMutability":"view",
           "type":"function"
        },
        {
           "inputs":[
              
           ],
           "name":"version",
           "outputs":[
              {
                 "internalType":"uint256",
                 "name":"",
                 "type":"uint256"
              }
           ],
           "stateMutability":"view",
           "type":"function"
        }
     ]';
}
?>