/* This file was generated by ext/mbstring/ucgendat/ucgendat.php.
 *
 *                     DO NOT EDIT THIS FILE!
 *
 * East Asian Width table
 *
 * Some characters in East Asian languages are intended to be displayed in a space
 * which is roughly square. (This contrasts with others such as the Latin alphabet,
 * which are taller than they are wide.) To display these East Asian characters
 * properly, twice the horizontal space is used. This must be taken into account
 * when doing things like wrapping text to a specific width.
 *
 * Each pair of numbers in the below table is a range of Unicode codepoints
 * which should be displayed as double-width.
 */

#define FIRST_DOUBLEWIDTH_CODEPOINT 0x1100

static const struct {
	int begin;
	int end;
} mbfl_eaw_table[] = {
	{ 0x1100, 0x115f },
	{ 0x231a, 0x231b },
	{ 0x2329, 0x232a },
	{ 0x23e9, 0x23ec },
	{ 0x23f0, 0x23f0 },
	{ 0x23f3, 0x23f3 },
	{ 0x25fd, 0x25fe },
	{ 0x2614, 0x2615 },
	{ 0x2648, 0x2653 },
	{ 0x267f, 0x267f },
	{ 0x2693, 0x2693 },
	{ 0x26a1, 0x26a1 },
	{ 0x26aa, 0x26ab },
	{ 0x26bd, 0x26be },
	{ 0x26c4, 0x26c5 },
	{ 0x26ce, 0x26ce },
	{ 0x26d4, 0x26d4 },
	{ 0x26ea, 0x26ea },
	{ 0x26f2, 0x26f3 },
	{ 0x26f5, 0x26f5 },
	{ 0x26fa, 0x26fa },
	{ 0x26fd, 0x26fd },
	{ 0x2705, 0x2705 },
	{ 0x270a, 0x270b },
	{ 0x2728, 0x2728 },
	{ 0x274c, 0x274c },
	{ 0x274e, 0x274e },
	{ 0x2753, 0x2755 },
	{ 0x2757, 0x2757 },
	{ 0x2795, 0x2797 },
	{ 0x27b0, 0x27b0 },
	{ 0x27bf, 0x27bf },
	{ 0x2b1b, 0x2b1c },
	{ 0x2b50, 0x2b50 },
	{ 0x2b55, 0x2b55 },
	{ 0x2e80, 0x2e99 },
	{ 0x2e9b, 0x2ef3 },
	{ 0x2f00, 0x2fd5 },
	{ 0x2ff0, 0x2ffb },
	{ 0x3000, 0x303e },
	{ 0x3041, 0x3096 },
	{ 0x3099, 0x30ff },
	{ 0x3105, 0x312f },
	{ 0x3131, 0x318e },
	{ 0x3190, 0x31e3 },
	{ 0x31f0, 0x321e },
	{ 0x3220, 0x3247 },
	{ 0x3250, 0x4dbf },
	{ 0x4e00, 0xa48c },
	{ 0xa490, 0xa4c6 },
	{ 0xa960, 0xa97c },
	{ 0xac00, 0xd7a3 },
	{ 0xf900, 0xfaff },
	{ 0xfe10, 0xfe19 },
	{ 0xfe30, 0xfe52 },
	{ 0xfe54, 0xfe66 },
	{ 0xfe68, 0xfe6b },
	{ 0xff01, 0xff60 },
	{ 0xffe0, 0xffe6 },
	{ 0x16fe0, 0x16fe4 },
	{ 0x16ff0, 0x16ff1 },
	{ 0x17000, 0x187f7 },
	{ 0x18800, 0x18cd5 },
	{ 0x18d00, 0x18d08 },
	{ 0x1aff0, 0x1aff3 },
	{ 0x1aff5, 0x1affb },
	{ 0x1affd, 0x1affe },
	{ 0x1b000, 0x1b122 },
	{ 0x1b150, 0x1b152 },
	{ 0x1b164, 0x1b167 },
	{ 0x1b170, 0x1b2fb },
	{ 0x1f004, 0x1f004 },
	{ 0x1f0cf, 0x1f0cf },
	{ 0x1f18e, 0x1f18e },
	{ 0x1f191, 0x1f19a },
	{ 0x1f200, 0x1f202 },
	{ 0x1f210, 0x1f23b },
	{ 0x1f240, 0x1f248 },
	{ 0x1f250, 0x1f251 },
	{ 0x1f260, 0x1f265 },
	{ 0x1f300, 0x1f320 },
	{ 0x1f32d, 0x1f335 },
	{ 0x1f337, 0x1f37c },
	{ 0x1f37e, 0x1f393 },
	{ 0x1f3a0, 0x1f3ca },
	{ 0x1f3cf, 0x1f3d3 },
	{ 0x1f3e0, 0x1f3f0 },
	{ 0x1f3f4, 0x1f3f4 },
	{ 0x1f3f8, 0x1f43e },
	{ 0x1f440, 0x1f440 },
	{ 0x1f442, 0x1f4fc },
	{ 0x1f4ff, 0x1f53d },
	{ 0x1f54b, 0x1f54e },
	{ 0x1f550, 0x1f567 },
	{ 0x1f57a, 0x1f57a },
	{ 0x1f595, 0x1f596 },
	{ 0x1f5a4, 0x1f5a4 },
	{ 0x1f5fb, 0x1f64f },
	{ 0x1f680, 0x1f6c5 },
	{ 0x1f6cc, 0x1f6cc },
	{ 0x1f6d0, 0x1f6d2 },
	{ 0x1f6d5, 0x1f6d7 },
	{ 0x1f6dd, 0x1f6df },
	{ 0x1f6eb, 0x1f6ec },
	{ 0x1f6f4, 0x1f6fc },
	{ 0x1f7e0, 0x1f7eb },
	{ 0x1f7f0, 0x1f7f0 },
	{ 0x1f90c, 0x1f93a },
	{ 0x1f93c, 0x1f945 },
	{ 0x1f947, 0x1f9ff },
	{ 0x1fa70, 0x1fa74 },
	{ 0x1fa78, 0x1fa7c },
	{ 0x1fa80, 0x1fa86 },
	{ 0x1fa90, 0x1faac },
	{ 0x1fab0, 0x1faba },
	{ 0x1fac0, 0x1fac5 },
	{ 0x1fad0, 0x1fad9 },
	{ 0x1fae0, 0x1fae7 },
	{ 0x1faf0, 0x1faf6 },
	{ 0x20000, 0x2fffd },
	{ 0x30000, 0x3fffd },
};