<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Criação do pagamento
            $charge = Charge::create([
                'amount' => $request->amount, // Valor em centavos
                'currency' => 'brl',
                'source' => $request->stripeToken, // Token gerado pelo Stripe.js
                'description' => 'Inscrição de ' . $request->nickname_user,
            ]);

            return response()->json(['message' => 'Pagamento realizado com sucesso!', 'charge' => $charge], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao processar o pagamento: ' . $e->getMessage()], 500);
        }
    }
}
