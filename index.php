<?php
$data = [];

// Request
if (isset($_GET['option'])) {
    switch ($_GET['option']) {
        case 'status':
            $data['status'] = 'SUCCESS';
            $data['message'] = 'API Running OK!';
            break;
        case 'register':
            // Sanitize and validate inputs
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_GET, 'senha', FILTER_SANITIZE_STRING);
            
            // Check if all parameters are provided and valid
            if ($id && $nome && $email && $senha) {
                // Simulate saving to a database
                $data['status'] = 'SUCCESS';
                $data['message'] = 'User registered successfully!';
                $data['user'] = [
                    'id' => $id,
                    'nome' => $nome,
                    'email' => $email
                ];
            } else {
                $data['status'] = 'ERROR';
                $data['message'] = 'Invalid or missing parameters';
            }
            break;
        default:
            $data['status'] = 'ERROR';
            $data['message'] = 'Invalid option';
            break;
    }
} else {
    $data['status'] = 'ERROR';
    $data['message'] = 'No option provided';
}

// Emit the response from the API
response($data);

// Construct the response
function response($data_response)
{
    header("Content-Type:application/json");
    echo json_encode($data_response);
}
?>
