use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

public function getUser(Request $request)
{
    $user = Auth::user();
    return response()->json(['name' => $user->name]);
}
