
def reverse_num(n):
    r = 0;
    while n != 0:
        d = int(n % 10)
        r = r * 10 + d
        n = int(n / 10)
    return r
