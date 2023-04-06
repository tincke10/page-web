class AuthController extends Controller
{
    public function login(Request $request)
    {
        $dni = $request->input('dni');
        $password = $request->input('password');

        $user = DB::table('usuariosapp')->where([
            ['nombusuario', '=', $user],
            ['password', '=', $password],
        ])->first();

        if ($user) {
            session()->put('user', $user);
